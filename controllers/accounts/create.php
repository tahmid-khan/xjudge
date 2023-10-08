<?php

$errors = [];

// check format errors
$username = $_POST['username'];
if (empty($username)) {
    $errors['username'] = 'A username must be provided';
} elseif (!preg_match('/^\w{3,32}$/', $username)) {
    $errors['username'] =
        'Username may contain only alphanumeric characters (A-Z, a-z, 0-9) or underscores (_) and' .
        'must be between 3 and 32 characters long';
}
$email = $_POST['email'];
if (empty($email)) {
    $errors['email'] = 'An email must be provided';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please provide a valid email address';
}
$password = $_POST['password'];
if (strlen($password) < 8) {
    $errors['password'] = 'Password must be at least 8 characters long';
}

if (!empty($errors)) {
    view('accounts/create-form.view.php', ['errors' => $errors]);
    die();
}

// connect to the database
global $db;
$db = connect_db();

// check if the user exists
$user = $db->query('SELECT * FROM user WHERE username = ?', [$username])->result();
if ($user) {
    $errors['username'] = 'Username already exists';
}
$user = $db->query('SELECT * FROM user WHERE email = ?', [$email])->result();
if ($user) {
    $errors['email'] = 'Email already exists';
}

if (!empty($errors)) {
    view('accounts/create-form.view.php', ['errors' => $errors]);
    die();
}

// create the user
$db->query(
    'INSERT INTO user (username, email, password) VALUES (:u, :e, :p)',
    [
        'u' => $username,
        'e' => $email,
        'p' => password_hash($password, PASSWORD_DEFAULT),
    ],
);

// log the user in and redirect to home
$_SESSION['user_id'] = $db->last_insert_id();
$_SESSION['name'] = $username;
header('Location: /');
