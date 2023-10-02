<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../../site/index.php");
    return;
}

include_once "../core.php";

class Register extends Dbh {

    protected function setUser($username, $email, $password) {

        $stmt = $this->connect()->prepare('INSERT INTO accounts (sessionid, username, email, pwd, administrator, moderator, client, pfp) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');

        $options = [
            'cost' => 14
        ];

        $sessionID = $this->SessionIDCreation();

        while (!$this->SessionIDCheck($sessionID)) {
            $sessionID = $this->SessionIDCreation();
        }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT, $options);

        $defaultpfp = "../../assets/images/DSCPIconSquare.png";

        if (!$stmt->execute(array($sessionID, $username, $email, $hashedPwd, 0, 0, 0, $defaultpfp))) {
            $stmt = null;
            header("location: ../../site/index.php?error=stmtfailed");
            exit();
        }

        require_once "../session-controller/config.php";

        $auth = new AuthenticationRegiser();

        $auth->DataCollection($sessionID);

        $stmt = null;
    }


    protected function checkUser($username, $email) {

        $stmt =$this->connect()->prepare('SELECT username FROM accounts WHERE username = ? or email = ?;');

        if (!$stmt->execute(array($username, $email))) {
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

    private function SessionIDCheck($sessionID) {
        $resultCheck = false;

        $stmt =$this->connect()->prepare('SELECT sessionid FROM accounts WHERE sessionid = ?;');

        if (!$stmt->execute(array($sessionID))) {
            $stmt = null;
            header("location: ../../site/index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;

        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    private function SessionIDCreation() {

        $core = new CoreControll();

        $sessionID = $core->generate_random_string(24);

        return $sessionID;

    }

}



