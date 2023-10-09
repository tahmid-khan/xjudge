<?php

$contest_id = $route_params['contest_id'];
$db = connect_db();

$contest = $db->query('SELECT * FROM contest WHERE id = ?', [$contest_id])->result();
dump($contest);

$problems = $db->query('SELECT * FROM contest_problem WHERE contest_id = ?', [$contest_id])->all_results();
dd($problems);

view('problems/index.view.php');
