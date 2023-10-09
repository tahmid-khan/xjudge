<?php

//dump($route_params);

$contest_id = $route_params['contest_id'];

$db = connect_db();
$contest = $db->query('SELECT * FROM contest WHERE id = ?', [$contest_id])->result();
if (!$contest) {
    abort(StatusCode::NOT_FOUND_404);
}
//dump($contest);

$submissions = $db->query('SELECT * FROM submission WHERE contest_id = ?', [$contest_id])->all_results();
//dump($submissions);

$users_submissions = [];
foreach ($submissions as $submission) {
    $user_id = $submission['submitter_id'];
    if (!isset($users_submissions[$user_id])) {
        $users_submissions[$user_id] = [];
    }
    $users_submissions[$user_id][] = $submission;
}
dump($users_submissions);

$users_solves = [];
foreach ($users_submissions as $user_id => $submissions) {
    $users_solves[$user_id] = [];
    foreach ($submissions as $submission) {
        $verdict = $submission['verdict'];
        if (str_contains(strtolower($verdict), 'accepted')) {
            $letter = $submission['problem_letter'];
            if (!in_array($letter, $users_solves[$user_id])) {
                $users_solves[$user_id][] = $letter;
            }
        }
    }
}

usort($users_solves, function ($a, $b) {
    return count($b) - count($a);
});
dump($users_solves);

view('contests/show.view.php', $contest);
