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

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../../site/index.php?error=nouser-return");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $user[0]["sessionid"];
            session_id($sessionId);

            $_SESSION["user_id"] = $user[0]["id"];
            $_SESSION["user_username"] = htmlspecialchars($user[0]["username"]);
            $_SESSION["user_email"] = htmlspecialchars($user[0]["email"]);

            $_SESSION["last_regeneration"] = time();

            $stmt = null;
        }

        $stmt = null;
    }

}

