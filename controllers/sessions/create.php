<?php

$client = new Google_Client();
$client->setClientId('312683763511-ll5e5svm78d9bqaai76qt620fk1hom1d.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://osprey-good-manually.ngrok-free.app/callback.php');
$client->addScope("email");
$client->addScope("profile");

$auth_error = $_SESSION['auth_error'] ?? null;
$loginUrl = $client->createAuthUrl();
require BASE_PATH . 'views/sessions/create.view.php';
