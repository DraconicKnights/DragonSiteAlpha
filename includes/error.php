<div class="error-box">
      <?php
        $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if (strpos($fullurl, "error=emptyinput") == true) {
            echo "<p class='error'>Empty Input: Please fill in all required fields</p>";
            exit();
          } else if (strpos($fullurl, "error=name") == true) {
            echo "<p class='error'>Invalid Name: Please enter a valid name</p>";
            exit();
          } else if (strpos($fullurl, "error=email") == true) {
            echo "<p class='error'>Invalid Email: Please enter a valid email</p>";
            exit();
          } else if (strpos($fullurl, "error=emailtaken") == true) {
            echo "<p class='error'>Email Taken: This email is already taken</p>";
            exit();
          } else if (strpos($fullurl, "error=did-not-agree-terms") == true) {
            echo "<p class='error'>Terms Error: You must aggree to the terms to register</p>";
            exit();
          }
        ?>
</div>