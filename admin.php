<?php
  include_once 'links.php';
  include 'includes/admin.inc.php'; // Admin only
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
?>

<head>
  <title>Admin</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">

      <ul class="admin-tools">
        <h3>Admin Tools</h3>
        <li><a href="viewusers.php">View Users</a></li>
      </ul>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>