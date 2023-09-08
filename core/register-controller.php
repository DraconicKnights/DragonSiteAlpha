<?php 

class RegisterController {

    private $firstname;
    private $lastname;
    private $password;
    private $email;

    public function __construct($firstname, $lastname, $password, $email) 
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->email = $email;
    }

    private function registerUser() {
        if ($this->emptyInput() == false) {
            header("location: ../site/index.html?error=emptyinput");
            exit();
        }
        if ($this->invalidName() == false) {
            header("location: ../site/index.html?error=name");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../site/index.html?error=email");
            exit();
        }
        if ($this->emailTakenCheck() == false) {
            header("location: ../site/index.html?error=emailtaken");
            exit();
        }

        $this->setUser();

    }



    private function emptyInput() {
        $result = false;
        if (empty($this->firstname) || empty($this->lastname) || empty($this->password) || empty($this->email)) {
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
        return $result;
    }



    private function emailTakenCheck() {
        $result = false;

        if (!$this>checkUser($this->firstname, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function validateInput() {
        // An array to store the error messages
        $errors = array();

        // Check for empty input
        if ($this->emptyInput()) {
            // Add an error message to the array
            array_push($errors, "Please fill in all fields.");
        }

        // Check for invalid name
        if ($this->invalidName()) {
            // Add an error message to the array
            array_push($errors, "Please enter a valid name.");
        }

        // Check for invalid email
        if ($this->invalidEmail()) {
            // Add an error message to the array
            array_push($errors, "Please enter a valid email.");
        }

        // Return the array of errors or an empty array if there are no errors
        return $errors;
    }

}