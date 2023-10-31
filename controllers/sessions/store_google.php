<?php

$client = new Google_Client();
$client->setClientId('312683763511-ll5e5svm78d9bqaai76qt620fk1hom1d.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://osprey-good-manually.ngrok-free.app/login/google-callback');
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user data
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email = $google_account_info->email;
    $name = $google_account_info->name;

    // Start session and store user data
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $name;
    echo "<script>console.log('Debug Objects: " . $name . "' );</script>";
    // Store user data in the database (optional)
    // Connect to your database and store user data

    // Redirect user to the desired page
    header('Location: /');
}
else {
    echo "<script>console.log('Debug Objects: ' );</script>";
}
?>
