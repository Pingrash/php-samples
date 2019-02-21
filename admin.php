<?php
  include_once 'links.php';
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
?>

<head>
  <title>Admin</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">

      <?php
        if (isset($_SESSION['userId']) == 6) {
          echo 'Hi Admin!';
        }
      ?>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>