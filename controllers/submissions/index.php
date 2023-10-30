<?php

$contest_id = $route_params['contest_id'];

require BASE_PATH . 'Database.php';
$db = connect_db();
$submissions = $db->query(
    /** @lang MySQL */ "SELECT * FROM submission WHERE contest_id = ?",
    [$contest_id]
)->all_results();

require BASE_PATH . 'views/submissions/index.view.php';
