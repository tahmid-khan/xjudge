<?php

$username = $_POST['username'];
$password = $_POST['password'];

// connect to the database
global $db;
$db = connect_db();

// check if the user exists
$user = $db->query('SELECT * FROM user WHERE username = ?', [$username])->result();
var_dump($user);
if (!$user) {
    http_response_code(StatusCode::NOT_FOUND_404);
    view('accounts/login-form.view.php', /* TODO: set error messages*/ );
    die();
}

// check if the password is correct
if (!password_verify($password, $user['password'])) {
    http_response_code(StatusCode::UNAUTHORIZED_401);
    view('accounts/login-form.view.php', /* TODO: set error messages*/ );
    die();
}

// log the user in and redirect to home
$_SESSION['user_id'] = $user['id'];
$_SESSION['name'] = $user['username'];
header('Location: /');
