<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {

    // Grabbing Web Data

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Instantiate Classes

    include "../core/includes/db.php";
    include "../core/register-classes.php";
    include "../core/register-controller.php";
    $register = new RegisterController($firstname, $lastname, $email, $password);

    // Calls the registerUser method

    $register->registerUser();

    //Re-directs the user to the dashboard page if succsessfull

    header("location: ../site/dashboard.php");


} else {
    header("Location: ../site/index.html");
}