<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'utils.php';
require path_from_base('vendor/autoload.php');
require path_from_base('Router.php');

session_start();

$router = new Router();

$router->register_get('/', controller: 'index.php');
$router->register_get('/about', controller: 'about.php');
$router->register_get('/help', controller: 'help.php');

$router->register_get('/signup', controller: 'accounts/create.php');
$router->register_post('/signup', controller: 'accounts/store.php');
$router->register_get('/profile', controller: 'accounts/show.php');
$router->register_post('/profile', controller: 'accounts/update.php');

$router->register_get('/login', controller: 'sessions/create.php');
$router->register_post('/login', controller: 'sessions/store.php');
$router->register_post('/logout', controller: 'sessions/destroy.php');

$router->register_get('/contests/create', controller: 'contests/create.php');
$router->register_post('/contests/create', controller: 'contests/store.php');
$router->register_get('/contests', controller: 'contests/index.php');
$router->register_get('/contests/:contest_id', controller: 'contests/show.php');

$router->register_get('/contests/:contest_id/problems', controller: 'problems/index.php');
$router->register_get('/contests/:contest_id/problems/:problem_letter', controller: 'problems/show.php');

$router->register_post('/contests/:contest_id/problems/:problem_letter', controller: 'submissions/store.php');
$router->register_get('/contests/:contest_id/submissions', controller: 'submissions/index.php');

$router->route(uri: $_SERVER['REQUEST_URI'], method: $_SERVER['REQUEST_METHOD']);
