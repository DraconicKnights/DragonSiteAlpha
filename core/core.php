<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../site/index.html");
    return;
}