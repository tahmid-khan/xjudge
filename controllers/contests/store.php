<?php

require_auth('You must be logged in to access this page.');

use voku\helper\HtmlDomParser;
global $db;

function problem_not_in_db(string $prob_id): bool
{
    global $db;
    $res = $db
        ->query('SELECT * FROM problem WHERE id = :id', ['id' => $prob_id])
        ->all_results();
    return empty($res);
}

function fetch_problem(string $prob_id): false|array
{
    $url = "https://codeforces.com/problemset/problem/$prob_id";
    $dom = HtmlDomParser::file_get_html($url);
    if (!$dom) {
        return false;
    }

    $title = $dom->findOne('.problem-statement')->findOne('.header > .title')->innerHtml();
    $title = substr($title, strpos($title, '. ') + 2);
    $text = $dom->findOne('.problemindexholder')->outerHtml();

    return [
        'id' => $prob_id,
        'title' => $title,
        'text' => $text,
    ];
}

function store_problem_in_db(array $prob_parts): bool
{
    global $db;
    return $db
        ->query('INSERT INTO problem (id, title, text) VALUES (:id, :title, :text)', $prob_parts)
        ->is_success();
}


$name = $_POST['name'];
$start_time = $_POST['start-time'];
$end_time = $_POST['end-time'];
$problem_ids = $_POST['problem-ids'];

if (strtotime($start_time) >= strtotime($end_time)) {
    http_response_code(StatusCode::UNPROCESSABLE_CONTENT_422);
    view('contests/create.view.php', [
        'errors' => ['end-time' => 'End time must be after start time'],
    ]);
    die();
}

// connect to the database
$db = connect_db();

// create the contest
$db->query('INSERT INTO contest (name, start_time, end_time, setter_id) VALUES (:n, :s, :e, :u)', [
    'n' => $name,
    's' => html_to_sql_time($start_time),
    'e' => html_to_sql_time($end_time),
    'u' => $_SESSION['user_id'],
]);
$contest_id = $db->last_insert_id();

// add the problems to the contest
foreach ($problem_ids as $index => $prob_id) {
    if (problem_not_in_db($prob_id)) {
        $parts = fetch_problem($prob_id);
        if (!$parts) {
            http_response_code(StatusCode::UNPROCESSABLE_CONTENT_422);
            view('contests/create.view.php', [
                'errors' => ['problem-ids' => "Problem $prob_id does not exist"],
            ]);
            die();
        }
        store_problem_in_db($parts);
    }

    $db->query('INSERT INTO contest_problem (contest_id, ordinal_letter, problem_id) VALUES (:c, :l, :p)', [
        'c' => $contest_id,
        'l' => chr(ord('A') + $index),
        'p' => $prob_id,
    ]);
}

// redirect to the contest page
header("Location: /contests/$contest_id");
