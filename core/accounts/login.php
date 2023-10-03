<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Grabbing Web Data

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Instantiate Classes

    include "../includes/db.php";
    include "../account-controller/login-classes.php";
    include "../account-controller/login-controller.php";
    $login = new LoginController($email, $password);

    // Calls the registerUser method

    $login->loginUser();

    //Re-directs the user to the dashboard page if succsessfull

    header("location: ../../site/");
}

