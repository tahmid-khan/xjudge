<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'utils.php';
require private_path('vendor/autoload.php');
require private_path('Router.php');

session_start();

$router = new Router();

$router->register_get('/', controller: 'index.php');
$router->register_get('/about', controller: 'about.php');
$router->register_get('/help', controller: 'help.php');

$router->register_get('/contests', controller: 'contests/index.php');
$router->register_get('/contests/create', controller: 'contests/create-form.php');
$router->register_post('/contests/create', controller: 'contests/create.php');

$router->register_get('/register', controller: 'accounts/create-form.php');
$router->register_post('/register', controller: 'accounts/create.php');
$router->register_get('/login', controller: 'accounts/login-form.php');
$router->register_post('/login', controller: 'accounts/login.php');

$router->route(uri: $_SERVER['REQUEST_URI'], method: $_SERVER['REQUEST_METHOD']);
