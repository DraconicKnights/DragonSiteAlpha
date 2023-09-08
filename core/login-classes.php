<?php 

class Login extends Dbh {

    protected function getUser($email, $password) {

        $stmt = $this->connect()->prepare('SELECT pwd FROM accounts WHERE email = ? OR pwd = ?;');

        if (!$stmt->execute(array($email, $password))) {
            $stmt = null;
            header("location: ../site/index.html?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../site/index.html?error=nouser");
            exit();
        }

        $hashedPwd = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($password, $hashedPwd[0]["pwd"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../site/index.html?error=wrongpassword");
            exit();
        } else if($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM accounts WHERE email = ? OR pwd = ?;');

            if (!$stmt->execute(array($email, $password))) {
                $stmt = null;
                header("location: ../site/index.html?error=stmtfailed");
                exit();
            }

            if (!$stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../site/index.html?error=nouser");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        $stmt = null;
    }

}

