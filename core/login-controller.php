<?php 

class LoginController extends Login {

    private $password;
    private $email;

    public function __construct($password, $email) 
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            header("location: ../site/index.html?error=emptyinput");
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