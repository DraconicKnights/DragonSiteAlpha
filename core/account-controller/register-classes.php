<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../../site/index.php");
    return;
}

class Register extends Dbh {

    protected function setUser($firstname, $lastname, $email, $password) {

        $stmt = $this->connect()->prepare('INSERT INTO accounts (firstname, lastname, email, pwd) VALUES (?, ?, ?, ?);');

        $options = [
            'cost' => 14
        ];

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT, $options);

        if (!$stmt->execute(array($firstname, $lastname, $email, $hashedPwd))) {
            $stmt = null;
            header("location: ../../site/index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


    protected function checkUser($firstname, $email) {

        $stmt =$this->connect()->prepare('SELECT firstname FROM accounts WHERE firstname = ? or email = ?;');

        if (!$stmt->execute(array($firstname, $email))) {
            $stmt = null;
            header("location: ../../site/index.php?error=stmtfailed");
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



