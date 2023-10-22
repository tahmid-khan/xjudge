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

function view(string $path, array $view_data = []): void
{
    extract($view_data);
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
