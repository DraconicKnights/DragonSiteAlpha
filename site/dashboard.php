<html>
<head>
<link rel="stylesheet" href="../assets//dash.css">
</head>
<body>
  <div class="container">
    <div class="navbar">
      <h1>My Website</h1>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </div>

    <div class="content">
      <!-- Add your dashboard content here -->
      <div class="card">
        <h3>Users</h3>
        <p>Number of users: 100</p>
        <p>Active users: 50</p>
        <p>New users today: 10</p>
        <a href="#">View details</a>
      </div>

      <div class="card">
        <h3>Posts</h3>
        <p>Number of posts: 200</p>
        <p>Published posts: 150</p>
        <p>Pending posts: 50</p>
        <a href="#">View details</a>
      </div>

      <div class="card">
        <h3>Comments</h3>
        <p>Number of comments: 300</p>
        <p>Approved comments: 200</p>
        <p>Spam comments: 100</p>
        <a href="#">View details</a>
      </div>

    </div>

  </div>

</body>
</html>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  header("Location: ../site/index.php");
  return;
}

?>
