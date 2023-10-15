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
    view('sessions/create.view.php', ['errors' => $errors]);
    die();
}

// connect to the database
global $db;
$db = connect_db();

// check if the user exists
$user = $db->query('SELECT * FROM user WHERE username = ?', [$username])->result();
if (!$user) {
    http_response_code(StatusCode::UNAUTHORIZED_401);
    view('sessions/create.view.php', [
        'errors' => [
            'username' => 'Username does not exist',
        ],
    ]);
    die();
}

// check if the password is correct
if (!password_verify($password, $user['password'])) {
    http_response_code(StatusCode::UNAUTHORIZED_401);
    view('sessions/create.view.php', [
        'errors' => [
            'password' => 'Incorrect password',
        ],
    ]);
    die();
}

// log the user in and redirect to home
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['email'] = $user['email'];
header('Location: /');
