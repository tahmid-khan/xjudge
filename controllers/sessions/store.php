<?php

$username = $_POST['username'];
$password = $_POST['password'];

// validate the form inputs
if (!$username || !$password) {
    http_response_code(StatusCode::UNAUTHORIZED_401);
    $errors = [];
    if (!$username) {
        $errors['username'] = 'Username is required';
    }
    if (!$password) {
        $errors['password'] = 'Password is required';
    }
    require BASE_PATH . 'views/sessions/create.view.php';
    die();
}

// connect to the database
global $db;
require BASE_PATH . 'Database.php';
$db = connect_db();

// check if the user exists
$user = $db
    ->query('SELECT * FROM user WHERE username = ?', [$username])
    ->result();
if (!$user) {
    http_response_code(StatusCode::UNAUTHORIZED_401);
    $errors = ['username' => 'Username does not exist'];
    require BASE_PATH . 'views/sessions/create.view.php';
    die();
}

// check if the password is correct
if (!password_verify($password, $user['password'])) {
    http_response_code(StatusCode::UNAUTHORIZED_401);
    $errors = ['password' => 'Incorrect password'];
    require BASE_PATH . 'views/sessions/create.view.php';
    die();
}

// log the user in and redirect to home
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['email'] = $user['email'];
header('Location: /');
