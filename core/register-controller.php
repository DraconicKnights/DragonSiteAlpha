<?php 

class RegisterController {

    private $firstname;
    private $lastname;
    private $password;
    private $email;

    public function __construct($firstname, $lastname, $password, $email) 
    {
        $this->$firstname = $firstname;
        $this->$lastname = $lastname;
        $this->$password = $password;
        $this->$email = $email;
    }

    private function emptyInput() {
        $result = false;
        if (empty($this->$firstname) || empty($this->$lastname) || empty($this->$password) || empty($this->$email)) {
            $resut = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidName() {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->firstname) || !preg_match("/^[a-zA-Z0-9]*$/", $this->lastname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result = false;

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
    }

}


?>