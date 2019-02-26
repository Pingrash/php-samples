<?php
  include_once 'links.php';
  include 'includes/admin.inc.php'; // Admin only
  include 'header.php';
  include 'includes/class/dbh.class.php';
  include 'includes/class/user.class.php';
  include 'includes/class/viewuser.class.php';
?>

<!-- Idea for thi page. Make it accessable to Admin only and provide tools to get user summeries, etc -->

<head>
  <title>View Users</title>
</head>

<body>

  <div class="main-container">
    <div class="container-fluid">
    
      <?php
        $users = new ViewUser();
        $users->showAllUsers();
      ?>
    
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>