<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../../site/index.php");
    return;
}

session_start();
session_unset();
session_destroy();

header("location: ../../site/index.php");