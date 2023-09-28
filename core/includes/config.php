<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["user_id"])) {

    if (!isset($_SESSION["last_regeneration"])) {
        RegenActiveSession();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            RegenActiveSession();
        }
    }
} else {

    if (!isset($_SESSION["last_regeneration"])) {
        RegenSession();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            RegenSession();
        }
    }
}



function RegenActiveSession() {
    
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];

    $newSessonId = session_create_id();
    $sessionId = $newSessonId . "-" . $userId;
    session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}

function RegenSession() {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

