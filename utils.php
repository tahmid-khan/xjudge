<?php

function dump($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function dd($value): void
{
    dump($value);
    die();
}

function base_path(string $base_relative_path): string
{
    return BASE_PATH . $base_relative_path;
}

function view(string $path, array $data = []): void
{
    extract($data);
    require 'views/' . $path;
}

function abort(int $response_code): void
{
    http_response_code($response_code);
    view("$response_code.php");
    die();
}

function connect_db(): Database
{
    require 'Database.php';
    $config = require 'config.php';
    return new Database($config['database']);
}

function html_to_sql_time(string $html_datetime): string
{
    return str_replace('T', ' ', $html_datetime);
}

function require_auth(string $message, string $redirect_path = '/login'): void
{
    if (!isset($_SESSION['user_id'])) {
        http_response_code(StatusCode::UNAUTHORIZED_401);
        $_SESSION['auth_error'] = $message;
        header("Location: $redirect_path");
        die();
    }
}

function redirect(string $path, string $message = null): void
{
    if ($message) {
        $_SESSION['flash'] = $message;
    }
    header("Location: $path");
}

function scrape_codeforces_problem(string $prob_id): false|array
{
    $dom = voku\helper\HtmlDomParser::file_get_html("https://codeforces.com/problemset/problem/$prob_id");
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
    if ($pre_elems) {
        $samples = "<ol>\n";
        for ($i = 0; $i < count($pre_elems); $i += 2) {
            $input = $pre_elems[$i]->outertext;
            $output = $pre_elems[$i + 1]->outertext;
            $samples .= "\t<li>$input$output</li>\n";
        }
        $samples .= '</ol>';
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
