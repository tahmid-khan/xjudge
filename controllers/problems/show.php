<?php

extract($route_params);

require BASE_PATH . 'Database.php';
$db = connect_db();

$contest = $db->query(
/** @lang MySQL */ '
      SELECT
        id,
        name,
        start_time,
        end_time,
        count(cp.problem_index) AS problem_count
      FROM contest JOIN contest_problem AS cp ON id = cp.contest_id
      WHERE id = ?
      GROUP BY id
', [$contest_id])->result();
if (!$contest) {
    abort(StatusCode::NOT_FOUND_404);
}
if (!$contest) {
    abort(StatusCode::NOT_FOUND_404);
}
$contest_id = $contest['id'];
$contest_name = $contest['name'];
$start_time = $contest['start_time'];
$end_time = $contest['end_time'];
$problem_count = $contest['problem_count'];

$problem_id = $db->query(
    'SELECT problem_id FROM contest_problem WHERE contest_id = ? AND problem_index = ?',
    [$contest_id, $problem_index]
)->result()['problem_id'];
if (!$problem_id) {
    abort(StatusCode::NOT_FOUND_404);
}

$problem = $db->query('SELECT * FROM problem WHERE id = ?', [$problem_id])->result();
if (!$problem) {
    abort(StatusCode::NOT_FOUND_404);
}
$problem_name = $problem['name'];
$statement = $problem['statement'];
$time_limit = $problem['time_limit'];
$memory_limit = $problem['memory_limit'];


// for each user and problem index, select the time of the latest submission up to the first AC
$statuses = [];
$db->query(
/** @lang MySQL */ "
    WITH
      filtered_submission AS (
        SELECT
          user_id,
          problem_index,
          time,
          verdict
        FROM submission
        WHERE
          contest_id = ?
          AND verdict <> 'CE'
          AND time <= coalesce(
            (
              SELECT min(time)
              FROM submission AS _
              WHERE
                contest_id = submission.contest_id
                AND user_id = submission.user_id
                AND problem_index = submission.problem_index
                AND verdict = 'AC'
            ),
            (
              SELECT max(time)
              FROM submission AS _
              WHERE
                contest_id = submission.contest_id
                AND user_id = submission.user_id
                AND problem_index = submission.problem_index
            )
          )
      )
    SELECT
      user_id,
      username,
      problem_index,
      count(*) AS attempt_count,
      sum(CASE WHEN verdict = 'AC' THEN 1 ELSE 0 END) AS ac_count
    FROM user JOIN filtered_submission ON user_id = user.id
    GROUP BY user_id, problem_index;",
    [$contest_id]
)->all_results(
    function (
        $user_id,
        $username,
        $problem_index,
        $attempt_count,
        $ac_count
    ) use (&$statuses) {
        $statuses[$user_id][ord($problem_index) - ord('A')] = [
            'username' => $username,
            'attempt_count' => $attempt_count,
            'is_accepted' => $ac_count != 0,
        ];
    }
);
foreach ($statuses as $user_id => $status) {
    $statuses[$user_id]['ac_count'] = array_reduce(
        $status,
        function ($carry, $problem_status) {
            return $carry + $problem_status['is_accepted'];
        },
        0
    );
}

require BASE_PATH . 'views/problems/show.view.php';
