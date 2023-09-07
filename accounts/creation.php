<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Grabbing Web Data

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    include "../core/register-classes.php";
    include "../core/register-controller.php";
    $register = new RegisterController($firstname, $lastname, $password, $email);

    try {

        require_once "../includes/db.php";

        $query = "INSERT INTO accounts (firstname, lastname, email, pwd) VALUES (?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$firstname, $lastname, $email, $password]);

        $pdo = null;
        $stmt = null;

        header("Location: ../site/dashboard.php");
        die();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }


} else {
    header("Location: ../site/index.html");
}

?>