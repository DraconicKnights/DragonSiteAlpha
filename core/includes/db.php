<?php

class Dbh {

    protected function connect() {

        try {

            $dns = "mysql:host=localhost;dbname=clients";
            $dbuser = "root";
            $dbpasswod = "";

            $dbh = new PDO($dns, $dbuser, $dbpasswod);
            return $dbh;
            
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}