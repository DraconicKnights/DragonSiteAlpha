<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../site/index.php");
    return;
}

class CoreControll {

    public $errormessage;

    public function ErrorHandler($message) {

        $this->errormessage = $message;

    }

}