<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../../site/index.php");
    return;
}

class LoginController extends Login {

    private $email;
    private $password;

    public function __construct($email, $password) 
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            header("location: ../../site/index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->email, $this->password);

    }



    private function emptyInput() {
        $result = false;
        if (empty($this->email) || empty($this->password)) {
            $resut = false;
        } else {
            $result = true;
        }
        return $result;
    }

}