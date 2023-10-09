<?php

view('sessions/create.view.php', [
    'auth_error' => $_SESSION['auth_error'] ?? null,
]);
