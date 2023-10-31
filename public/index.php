<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'utils.php';
require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'Router.php';

session_start();

$router = new Router();

$router->map_get('/', controller: 'index.php');
$router->map_get('/about', controller: 'about.php');
$router->map_get('/help', controller: 'help.php');

$router->map_get('/signup', controller: 'accounts/create.php');
$router->map_post('/signup', controller: 'accounts/store.php');
$router->map_get('/profile', controller: 'accounts/show.php');
$router->map_get('/profile/edit', controller: 'accounts/edit.php');
$router->map_post('/profile', controller: 'accounts/update.php');

$router->map_get('/login', controller: 'sessions/create.php');
$router->map_post('/login', controller: 'sessions/store.php');
$router->map_get('/login/google-callback', controller: 'sessions/store_google.php');
$router->map_get('/logout', controller: 'sessions/destroy.php');

$router->map_get('/contests/new', controller: 'contests/create.php');
$router->map_post('/contests/new', controller: 'contests/store.php');
$router->map_get('/contests', controller: 'contests/index.php');
$router->map_get('/contests/:contest_id', controller: 'problems/index.php');
$router->map_get('/contests/:contest_id/scoreboard', controller: 'contests/show_scoreboard.php');

$router->map_get('/contests/:contest_id/problems', controller: 'problems/index.php');
$router->map_get('/contests/:contest_id/problems/:problem_index', controller: 'problems/show.php');

$router->map_post('/contests/:contest_id/problems/:problem_index', controller: 'submissions/store.php');
$router->map_get('/contests/:contest_id/submissions', controller: 'submissions/index.php');
$router->map_get('/contests/:contest_id/submissions/:submission_id', controller: 'submissions/show.php');

$router->route(uri: $_SERVER['REQUEST_URI'], method: $_SERVER['REQUEST_METHOD']);
