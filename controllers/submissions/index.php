<?php

$contest_id = $route_params['contest_id'];

require BASE_PATH . 'Database.php';
$db = connect_db();
$submissions = $db->query(
    /** @lang MySQL */ "SELECT * FROM submission WHERE contest_id = ?",
    [$contest_id]
)->all_results();

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

require BASE_PATH . 'views/submissions/index.view.php';
