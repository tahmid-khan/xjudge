<?php

$db = connect_db();

$contests = $db->query('SELECT * FROM contest')->all_results();

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

view('contests/index.view.php', ['contests' => $contests]);
