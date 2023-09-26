<header>
  <div class="navbar-wrapper">
    <h2 class="logo">
      <a href="../site/index.php">
        <img class="logo-img" src="../assets/images/DSCPIconSquare.png" alt="Logo" width="70px" height="70px">
      </a>
    </h2>
    <nav class="navigation">
      <a href="../site/index.php" class=" <?php if ($page=='home') {echo 'active';}?>">Home</a>
      <a href="../site/about.php" class=" <?php if ($page=='home') {echo 'active';}?>">About</a>
      <a href="../site/services.php" class=" <?php if ($page=='home') {echo 'active';}?>">Services</a>
      <a href="../site/contact.php" class=" <?php if ($page=='home') {echo 'active';}?>">Contact</a>
      <?php 
          if(isset($_SESSION["userid"])) 
          {
      ?>
          <form action="/core/accounts/logout.php" method="post">
            <button class="btnLogin-popup">Logout</button>
          </form>
          <a href="../site/profile.php"><?php echo htmlspecialchars($_SESSION["useruid"]); ?></a>
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
  </div>
</header>