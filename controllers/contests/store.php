<?php

require_auth('You must be logged in to access this page.');

global $db;

function problem_not_in_db(string $problem_id): bool
{
    global $db;
    $res = $db
        ->query('SELECT * FROM problem WHERE id = ?', [$problem_id])
        ->all_results();
    return empty($res);
}

function store_problem_in_db(array $prob_parts): bool
{
    global $db;
    return $db
        ->query(
            'INSERT INTO problem (id, title, time_limit, memory_limit, statement, input_spec, output_spec, samples)
                                VALUES (:id, :title, :time_limit, :memory_limit, :statement, :input_spec, :output_spec, :samples)',
            $prob_parts
        )->is_success();
}

$name = $_POST['name'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$problem_ids = $_POST['problem_codes'];
$aliases = $_POST['aliases'];

if (strtotime($start_time) >= strtotime($end_time)) {
    http_response_code(StatusCode::UNPROCESSABLE_CONTENT_422);
    $errors = ['end_time' => 'End time must be after start time'];
    require BASE_PATH . 'views/contests/create.view.php';
    die();
}

// connect to the database
require BASE_PATH . 'Database.php';
$db = connect_db();


function html_to_sql_time(string $html_datetime): string
{
    return str_replace('T', ' ', $html_datetime);
}

// create the contest
$db->query('INSERT INTO contest (name, start_time, end_time, setter_id) VALUES (:n, :s, :e, :u)', [
    'n' => $name,
    's' => html_to_sql_time($start_time),
    'e' => html_to_sql_time($end_time),
    'u' => $_SESSION['user_id'],
]);
$contest_id = $db->last_insert_id();

function scrape_codeforces_problem(string $prob_id): false|array
{
    $dom = HtmlDomParser::file_get_html("https://codeforces.com/problemset/problem/$prob_id");
    if (!$dom) {
        return false;
    }

    $dom = $dom->findOne('.problemindexholder');
    $title = $dom->findOne('.title')->innertext;
    $title = mb_substr($title, mb_strpos($title, '. ') + 2);
    $time_limit = $dom->findOne('.time-limit')->lastChild()->text;
    $memory_limit = $dom->findOne('.memory-limit')->lastChild()->text;

    $dom = $dom->findOne('.problem-statement');
    $statement = $dom->childNodes()[1]->innertext;
    $input_spec = $dom->findOne('.input-specification')->innertext;
    $input_spec = mb_substr($input_spec, mb_strpos($input_spec, '<p>'));
    $output_spec = $dom->findOne('.output-specification')->innertext;
    $output_spec = mb_substr($output_spec, mb_strpos($output_spec, '<p>'));

    $dom = $dom->findOneOrFalse('.sample-tests') ?? null;
    $samples = '';
    $pre_elems = $dom?->findMultiOrFalse('pre');
    for ($i = 0; $i < count($pre_elems); $i += 2) {
        $input = extract_sample_text($pre_elems[$i]);
        $output = extract_sample_text($pre_elems[$i + 1]);
        $samples .= "\t<li>$input$output</li>\n";
    }

    return [
        'id' => $prob_id,
        'title' => $title,
        'time_limit' => $time_limit,
        'memory_limit' => $memory_limit,
        'statement' => $statement,
        'input_spec' => $input_spec,
        'output_spec' => $output_spec,
        'samples' => $samples,
    ];
}

// add the problems to the contest
foreach ($problem_ids as $index => $prob_id) {
    if (problem_not_in_db($prob_id)) {
        $parts = scrape_codeforces_problem($prob_id);
        if ($aliases[$index]) {
            $parts['title'] = $aliases[$index];
        }
        if (!$parts) {
            http_response_code(StatusCode::UNPROCESSABLE_CONTENT_422);
            $errors = ['problem_ids' => "Problem $prob_id does not exist"];
            require BASE_PATH . 'views/contests/create.view.php';
            die();
        }
        store_problem_in_db($parts);
    }

    $db->query('INSERT INTO contest_problem (contest_id, problem_index, problem_id) VALUES (:c, :l, :p)', [
        'c' => $contest_id,
        'l' => chr(ord('A') + $index),
        'p' => $prob_id,
    ]);
}

// redirect to the contest page
redirect("/contests/$contest_id");
