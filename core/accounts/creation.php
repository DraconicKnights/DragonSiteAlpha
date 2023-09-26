<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Grabbing Web Data

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!isset($_POST['checkbox-bool'])) {
        header("location: ../../site/index.php?error=did-not-agree-terms");
        return;
    }

    // Instantiate Classes

    include "../includes/db.php";
    include "../account-controller/register-classes.php";
    include "../account-controller/register-controller.php";
    $register = new RegisterController($username, $email, $password);

    // Calls the registerUser method

    $register->registerUser();

    //Re-directs the user to the dashboard page if succsessfull

    header("location: ../../site/");


} else {
    header("Location: ../../site/index.php");
}