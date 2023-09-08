<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Grabbing Web Data

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Instantiate Classes

    include "../includes/db.php";
    include "../account-controller/register-classes.php";
    include "../account-controller/register-controller.php";
    $register = new RegisterController($firstname, $lastname, $email, $password);

    // Calls the registerUser method

    $register->registerUser();

    //Re-directs the user to the dashboard page if succsessfull

    header("location: ../../site/dashboard.php");


} else {
    header("Location: ../../site/index.php");
}