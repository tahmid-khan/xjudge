<?php

$contest_id = $route_params['contest_id'];

$db = connect_db();
$submissions = $db->query(
    /** @lang MySQL */ "SELECT * FROM submission WHERE contest_id = ?",
    [$contest_id]
)->all_results();

dump($submissions);
view('submissions/index.view.php', ['submissions' => $submissions]);
