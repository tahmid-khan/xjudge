<?php

extract($route_params);

$db = connect_db();

$contest = $db->query('SELECT * FROM contest WHERE id = ?', [$contest_id])->result();
if (!$contest) {
    abort(StatusCode::NOT_FOUND_404);
}

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

view('problems/show.view.php', [
    'contest' => $contest,
    'problem_index' => $problem_index,
    'problem' => $problem,
]);
