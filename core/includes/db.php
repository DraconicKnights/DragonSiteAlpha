<?php

// require_once 'vendor/autoload.php';

// use Dotenv\Dotenv;

// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

class Dbh {

    protected function connect() {

        try {

            $dns = "mysql:host=localhost;dbname=clients";
            $dbuser = "root";
            $dbpasswod = "";

            $dbh = new PDO($dns, $dbuser, $dbpasswod);

            // $dbh = new PDO("mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASSWORD'));

            return $dbh;
            
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}