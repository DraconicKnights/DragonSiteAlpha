<?php
  session_start();
?>

<html>
<head>
<link rel="stylesheet" href="../assets/styles/home.css">
</head>
<body>
  <header>
    <h2 class="logo">
      <a href="../site/index.php">
        <img class="logo-img" src="../assets/images/DSCPIconSquare.png" alt="Logo" width="70px" height="70px">
      </a>
    </h2>
    <nav class="navigation">
      <a href="../site/index.php">Home</a>
      <a href="../site/about.php">About</a>
      <a href="../site/services.php">Services</a>
      <a href="../site/contact.php">Contact</a>
      <?php 
          if(isset($_SESSION["userid"])) 
          {
      ?>
          <a href="#"><?php echo $_SESSION["useruid"]; ?></a>
          <a href="../core//accounts/logout.php" class="btnLogin-popup">Logout</button>
      <?php
          }
          else 
          {
      ?>
          <button class="btnLogin-popup">Login</button>
      <?php
          }
      ?>
    </nav>
  </header>

  <div class="wrapper">

    <span class="icon-close">
      <ion-icon name="close"></ion-icon>
    </span>


    <div class="form-box login">
      <h2>Login</h2>
      <form action="../core/accounts/login.php" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">
          Remember me</label>
          <a href="#">Forgot Password </a>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="login-register">
          <p>Don't have an account <a href="#" class="register-link">Register</a>
          </p>
        </div>
      </form>
    </div>

    <div class="form-box register">
      <h2>Registration</h2>
      <form action="../core/accounts/creation.php" method="post">
      <div class="input-box">
          <span class="icon">
            <ion-icon name="person"></ion-icon>
          </span>
          <input type="text" name="firstname" required>
          <label>Firstname</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="person"></ion-icon>
          </span>
          <input type="text" name="lastname" required>
          <label>Lastname</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" name="checkbox-bool">I agree to the terms and conditions</label>
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="login-register">
          <p>Already have an account <a href="#" class="login-link">Login</a>
          </p>
        </div>
      </form>
    </div>

  </div>

  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="../scripts/home.js"></script>
</body>
</html>
