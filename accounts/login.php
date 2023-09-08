<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {

    // Grabbing Web Data

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Instantiate Classes

    include "../core/includes/db.php";
    include "../core/login-classes.php";
    include "../core/login-controller.php";
    $login = new LoginController($email, $password);

    // Calls the registerUser method

    $login->loginUser();

    //Re-directs the user to the dashboard page if succsessfull

    header("location: ../site/dashboard.php");


} else {
    header("Location: ../site/index.html");
}