<?php

$contest_id = $route_params['contest_id'];
$db = connect_db();

$contest = $db
    ->query('SELECT * FROM contest WHERE id = ?', [$contest_id])
    ->result();
if (!$contest) {
    abort(StatusCode::NOT_FOUND_404);
}

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
      max(time) AS last_attempt_time,
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
        $last_attempt_time,
        $ac_count
    ) use (&$statuses) {
        $statuses[$user_id][$problem_index] = [
            'username' => $username,
            'attempt_count' => $attempt_count,
            'last_attempt_time' => $last_attempt_time,
            'is_accepted' => $ac_count != 0,
        ];
    }
);

dump($statuses);

// standings according to ICPC scoring rules
$standings = [
    [
        'rank' => 0,
        'user_id' => -1,
        'solve_count' => -1,
        'total_time' => -1,
    ],
];
$running_rank = 0;
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
          contest_id = :contest_id
          AND verdict <> 'CE'
          AND time <= (
            SELECT min(time)
            FROM submission AS _
            WHERE
              contest_id = submission.contest_id
              AND user_id = submission.user_id
              AND problem_index = submission.problem_index
              AND verdict = 'AC'
          )
      )
    SELECT
      user_id,
      sum(CASE WHEN verdict = 'AC' THEN 1 ELSE 0 END) AS solve_count,
      sum(
        CASE
          WHEN verdict = 'AC' THEN timestampdiff(SECOND, :start_time, time)
          ELSE 20 * 60
        END
      ) AS total_time # time for first AC, plus 20 penalty minutes for every previously rejected run
    FROM filtered_submission
    GROUP BY user_id
    ORDER BY # ranking
      solve_count DESC, # first according to the most problems solved
      total_time ASC, # then by the least total time
      max(time) ASC; # then by the earliest time of the last accepted run",
    [
        'contest_id' => $contest_id,
        'start_time' => $contest['start_time'],
    ]
)->all_results(function($user_id, $solve_count, $total_time) use (&$standings, &$running_rank) {
    $prev = end($standings);
    if ($prev['solve_count'] != $solve_count ||
        $prev['total_time'] != $total_time
    ) {
        $running_rank++;
    }

    $standings[] = [
        'rank' => $running_rank,
        'user_id' => $user_id,
        'solve_count' => $solve_count,
        'total_time' => $total_time,
    ];
});
unset($standings[0]);

$running_rank++;
foreach ($statuses as $user_id => $status) {
    if (!array_key_exists($user_id, $standings)) {
        $standings[] = [
            'rank' => $running_rank,
            'user_id' => $user_id,
            'solve_count' => 0,
            'total_time' => 0,
        ];
    }
}

dd($standings);

view('contests/show.view.php', [
    'contest' => $contest,
    'standings' => $standings,
    'statuses' => $statuses,
]);
