<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST["email"];
    $password = $_POST["password"];

    try {

        require_once "../includes/db.php";

        $query = "SELECT * FROM accounts WHERE email = ?;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$email]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($results)) {
            header("Location: ../site/index.html");
        } else {

            foreach ($results as $row) {
                if ($row["pwd"] == $password) {
                    header("Location: ../site/dashboard.php");
                } else {
                    header("Location: ../site/index.html");
                }
            }
        }


        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }


} else {
    header("Location: ../site/index.html");
}

?>