<?php 

class Register extends Dbh {

    protected function setUser($firstname, $lastname, $email, $password) {

        $stmt = $this->connect()->prepare('INSERT INTO accounts (firstname, lastname, email, pwd) VALUES (?, ?, ?, ?');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($firstname, $lastname, $email, $hashedPwd))) {
            $stmt = null;
            header("location: ../site/index.html?error=stmtfailed");
            exit();
        }

        $resultCheck = false;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;

        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }


    protected function checkUser($firstname, $email) {

        $stmt =$this->connect()->prepare('SELECT firstname FROM accounts WHERE firstname = ? or email = ?;');

        if (!$stmt->execute(array($firstname, $email))) {
            $stmt = null;
            header("location: ../site/index.html?error=stmtfailed");
            exit();
        }

        $resultCheck = false;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;

        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}



