<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'utils.php';
require base_path('vendor/autoload.php');
require base_path('Router.php');

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
$router->map_get('/logout', controller: 'sessions/destroy.php');

$router->map_get('/contests/new', controller: 'contests/create.php');
$router->map_post('/contests/new', controller: 'contests/store.php');
$router->map_get('/contests', controller: 'contests/index.php');
$router->map_get('/contests/:contest_id', controller: 'contests/show.php');

$router->map_get('/contests/:contest_id/problems', controller: 'problems/index.php');
$router->map_get('/contests/:contest_id/problems/:problem_index', controller: 'problems/show.php');

$router->map_post('/contests/:contest_id/problems/:problem_index', controller: 'submissions/store.php');
$router->map_get('/contests/:contest_id/submissions', controller: 'submissions/index.php');

$router->route(uri: $_SERVER['REQUEST_URI'], method: $_SERVER['REQUEST_METHOD']);
