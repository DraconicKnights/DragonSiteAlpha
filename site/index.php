<?php
  require_once "../core/session-controller/config.php";
?>

<html>
<head>
  <!-- Head -->
  <?php $page ='home'; include "../includes/head.php"; ?>
  <!-- Head -->
</head>

<body>

  <!-- Navbar -->
  <?php include "../includes/navbar.php"; ?>
  <!-- Navbar -->

  <!-- Login and Register Box -->
  <?php include "../includes/loginbox.php"; ?>
  <!-- Login and Register Box -->

  <div class="main-wrapper">
    <div class="main-content">
        <h1>Example</h1>
        <p> This is something</p>
    </div>
  </div>

  <!-- Error Handler -->
  <?php include "../includes/error.php"; ?>
  <!-- Error Handler -->

  <!-- Scripts -->
  <?php include "../includes/scripts.php"; ?>
  <!-- Scripts -->

  <!-- Footer -->
  <?php include "../includes/footer.php"; ?>
  <!-- Footer -->

</body>
</html>
