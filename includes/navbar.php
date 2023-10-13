<header>
  <div class="navbar-wrapper">
    <h2 class="logo">
      <a href="../site/">
        <img class="nav-logo-img" src="../assets/images/DSCPIconSquare.png" alt="Logo">
      </a>
    </h2>
    <nav class="navigation">
      <a href="../site/" class=" <?php if ($page=='home') {echo 'active';}?>">Home</a>
      <a href="../site/news.php" class=" <?php if ($page=='news') {echo 'active';}?>">News</a>
      <a href="../site/about.php" class=" <?php if ($page=='about') {echo 'active';}?>">About</a>
      <a href="../site/services.php" class=" <?php if ($page=='services') {echo 'active';}?>">Services</a>
      <a href="../site/contact.php" class=" <?php if ($page=='contact') {echo 'active';}?>">Contact</a>
    </nav>
    <nav class ="navigation-profile-bar">
      <a href="../site/profile.php">
        <img class="profile-img" src="../assets/images/DSCPIconSquare.png" alt="Logo" width="25px" height="25px">
      </a>
      <a href="#">
        <span class="icon" id="setting-switch">
          <ion-icon name="settings"></ion-icon>
        </span>      
      </a>
      <a href="#">
        <span class="icon" id="notfication-switch">
          <ion-icon name="notifications"></ion-icon>
        </span>      
      </a>
      <a href="#">
        <span class="icon" id="theme-switch">
          <ion-icon name="moon"></ion-icon>
        </span>      
      </a>
      <button class='btnLogin-popup'>Login</button>
    </nav>
  </div>
</header>