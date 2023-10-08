<?php

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

// connect to the database
$db = connect_db();

// create the contest
$db->query(
    'INSERT INTO contest (name, start_time, end_time, setter_id) VALUES (:name, :start_time, :end_time, :setter_id)',
    [
        'name' => $name,
        'start_time' => html_to_sql_time($start_time),
        'end_time' => html_to_sql_time($end_time),
        'setter_id' => 1,
    ]
);
$contest_id = $db->last_insert_id();

// add the problems to the contest
foreach ($problem_ids as $prob_id) {
    if (problem_not_in_db($prob_id)) {
        $parts = fetch_problem($prob_id);
        if (!$parts) {
            abort(StatusCode::NOT_FOUND_404);
        }
        store_problem_in_db($parts);
    }

    $db->query('INSERT INTO contest_has_problem (contest_id, problem_id) VALUES (:contest_id, :problem_id)', [
        'contest_id' => $contest_id,
        'problem_id' => $prob_id,
    ]);
}

//view('contests/create-form.view.php');
