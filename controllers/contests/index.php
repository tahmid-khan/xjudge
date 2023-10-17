<?php

$db = connect_db();

$name_contains = $_GET['name'] ?? '';
$headless = array_key_exists('headless', $_GET);

$contests = $db->query("SELECT * FROM contest WHERE name LIKE CONCAT('%', ?, '%')", [$name_contains])->all_results();

foreach ($contests as $index => $contest) {
    $setter = $db->query('SELECT username FROM user WHERE id = ?', [$contest['setter_id']])->result()['username'];
    $contests[$index]['setter'] = $setter;

    $start_time = strtotime($contest['start_time']);
    $end_time = strtotime($contest['end_time']);
    $contests[$index]['start_time'] = date('Y-m-d\TH:i', $start_time);
    $contests[$index]['end_time'] = date('Y-m-d\TH:i', $end_time);

    $duration = $end_time - $start_time;
    $contests[$index]['duration'] = date('H:i', $duration);
}

view('contests/index.view.php', [
    'page_title' => 'Contests — Xjudge',
    'current_in_nav' => 'contests',
    'banner_header' => 'Contests',
    'contests' => $contests,
    'headless' => $headless,
]);
