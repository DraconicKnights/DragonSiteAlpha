<?php 

class Register extends Dbh {

    protected function checkUser($firstname, $email) {
        $stmt = $this->connect()->prepare('SELECT firstname FROM users WHERE firstname = ? or email = ?;');
    }

}



