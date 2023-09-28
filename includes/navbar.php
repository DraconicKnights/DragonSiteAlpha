<header>
  <div class="navbar-wrapper">
    <h2 class="logo">
      <a href="../site/">
        <img class="nav-logo-img" src="../assets/images/DSCPIconSquare.png" alt="Logo">
      </a>
    </h2>
    <nav class="navigation">
      <a href="../site/" class=" <?php if ($page=='home') {echo 'active';}?>">Home</a>
      <a href="../site/about.php" class=" <?php if ($page=='home') {echo 'active';}?>">About</a>
      <a href="../site/services.php" class=" <?php if ($page=='home') {echo 'active';}?>">Services</a>
      <a href="../site/contact.php" class=" <?php if ($page=='home') {echo 'active';}?>">Contact</a>
      <a href="../site/contact.php" class=" <?php if ($page=='home') {echo 'active';}?>">Contact</a>
    </nav>
    <nav class ="navigation-profile-bar">
      <a href="../site/profile.php">
        <img class="profile-img" src="../assets/images/DSCPIconSquare.png" alt="Logo" width="25px" height="25px">
      </a>
      <a href="../site/profile.php">
        <span class="icon">
          <ion-icon name="settings"></ion-icon>
        </span>      
      </a>
      <a href="#">
        <span class="icon" id="theme-switch">
          <ion-icon name="moon"></ion-icon>
        </span>      
      </a>
      <?php
        if(isset($_SESSION['user_id'])) {
          echo "<form action='/core/accounts/logout.php' method='post'>
                  <button class='btnLogin-popup'>Logout</button>
                </form>";
        }
        else {
          echo "<button class='btnLogin-popup'>Login</button>";
        }
      ?>
    </nav>
  </div>
</header>