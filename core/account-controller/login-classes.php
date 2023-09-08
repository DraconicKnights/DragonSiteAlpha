<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../../site/index.php");
    return;
}

class Login extends Dbh {

    protected function getUser($email, $password) {

        $stmt = $this->connect()->prepare('SELECT pwd FROM accounts WHERE email = ? OR pwd = ?;');

        if (!$stmt->execute(array($email, $password))) {
            $stmt = null;
            header("location: ../../site/index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../../site/index.php?error=nouser");
            exit();
        }

        $hashedPwd = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($password, $hashedPwd[0]["pwd"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../../site/index.php?error=wrongpassword");
            exit();
        } else if($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM accounts WHERE email = ? OR pwd = ?;');

            if (!$stmt->execute(array($email, $password))) {
                $stmt = null;
                header("location: ../../site/index.php?error=stmtfailed");
                exit();
            }

            if (!$stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../../site/index.php?error=nouser-return");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["useruid"] = $user[0]["email"];

            $stmt = null;
        }

        $stmt = null;
    }

}

