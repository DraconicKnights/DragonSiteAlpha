<?php

class Dbh {

    private function connect() {

        try {

            $dns = "mysql:host=localhost;dbname=clients";
            $dbuser = "root";
            $dbpasswod = "";

            $dbh = new PDO($dns, $dbuser, $dbpasswod);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            return $dbh;
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}

?>