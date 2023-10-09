<?php

$db = connect_db();

$contests = $db->query('SELECT * FROM contest')->all_results();

view('contests/index.view.php', ['contests' => $contests]);
