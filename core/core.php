<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location: ../site/index.php");
    return;
}

class CoreControll {

    public function generate_random_string($length) {
        // Define a string of possible characters to choose from
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        // Get the length of the string of characters
        $characters_length = strlen($characters);
        $random_string = "";
        // Loop for $length times
        for ($i = 0; $i < $length; $i++) {
          $random_index = rand(0, $characters_length - 1);
          $random_string .= $characters[$random_index];
        }
        // Return the random string

        return $random_string;
    }

}