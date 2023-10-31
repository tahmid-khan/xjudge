<?php

$contest_id = $route_params['contest_id'];
require BASE_PATH . 'Database.php';
$db = connect_db();

$contest = $db->query('SELECT * FROM contest WHERE id = ?', [$contest_id])->result();
if (!$contest) {
    abort(StatusCode::NOT_FOUND_404);
}
$contest_id = $contest['id'];
$contest_name = $contest['name'];
$start_time = $contest['start_time'];
$end_time = $contest['end_time'];
$problem_count = $contest['problem_count'];

$problems = $db->query(
    'SELECT * FROM problem LEFT JOIN contest_problem cp on problem.id = cp.problem_id WHERE contest_id = ?',
    [$contest_id]
)->all_results();

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
      timestampdiff(SECOND, ?, max(time)) AS last_attempt_time,
      sum(CASE WHEN verdict = 'AC' THEN 1 ELSE 0 END) AS ac_count
    FROM user JOIN filtered_submission ON user_id = user.id
    GROUP BY user_id, problem_index;",
    [$contest_id, $start_time]
)->all_results(
    function (
        $user_id,
        $username,
        $problem_index,
        $attempt_count,
        $last_attempt_time,
        $ac_count
    ) use (&$statuses) {
        $statuses[$user_id][ord($problem_index) - ord('A')] = [
            'username' => $username,
            'attempt_count' => $attempt_count,
            'last_attempt_time' => $last_attempt_time,
            'is_accepted' => $ac_count != 0,
        ];
        $statuses[$user_id]['username'] = $username;
    }
);

require BASE_PATH . 'views/problems/index.view.php';
