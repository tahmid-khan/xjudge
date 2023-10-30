<?php

$contest_id = $route_params['contest_id'];
require BASE_PATH . 'Database.php';
$db = connect_db();

$contest = $db->query('SELECT * FROM contest WHERE id = ?', [$contest_id])->result();
if (!$contest) {
    abort(StatusCode::NOT_FOUND_404);
}

$problems = $db->query(
    'SELECT * FROM problem LEFT JOIN contest_problem cp on problem.id = cp.problem_id WHERE contest_id = ?',
    [$contest_id]
)->all_results();

$page_title = "Contest: {$contest['name']} — Xjudge";
$banner_header = "{$contest['name']}";
require BASE_PATH . 'views/problems/index.view.php';
