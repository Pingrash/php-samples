<?php
  include_once 'links.php';
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
  include_once 'includes/dbh.inc.php';
?>

<head>
  <title>Profile</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">

      <h1 class="profile-h1">Profile</h1>

      <?php

        if (isset($_SESSION['userId'])) {
          echo '<h2 class="profile-h2">Info</h2>';
          $id = $_SESSION['userId'];
          $sqlImg = "SELECT * FROM profileimg WHERE userid='$id';";
          $resultImg = mysqli_query($conn, $sqlImg);
          while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo '<div class="user-container">';
              if ($rowImg['status'] == 0) {
                echo '<img src="uploads/profile'.$id.'.'.$rowImg['ext'].'?'.mt_rand().'" alt="profile img">';
                // mt_rand is used to add a random number to the end of the file forcing the browser to update as if it was just the same name as before the old image may be cached
              } else {
                echo '<img src="uploads/defaultprofile.jpg">';
              }
              echo "<p>".$_SESSION['userUid']."</p>";
            echo '</div>';
          }

          if (isset($_SESSION['userId'])) {
            // Display who you are logged in as
            echo "<p>Logged in as: ". $_SESSION['userUid'];

            // Image upload form
            echo '<h2 class="profile-h2">Update Profile Avatar</h2>';
            echo '<form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" accept="image/*">
            <button type="submit" name="submit">Upload</button>';
            if (isset($_GET['success'])) {
              echo '<span class="form-span success">Upload successful</span>';
            }
            if (isset($_GET['error'])) {
              switch ($_GET['error']) {
                case 'ext':
                  echo '<span class="form-span error">Invalid file extension! .jpg, .jpeg and .png only.</span>';
                  break;
                case 'upload':
                  echo '<span class="form-span error">There was an error uploading your file!</span>';
                  break;
                case 'size':
                  echo '<span class="form-span error">File size too large! File must be no larger than 1mb.</span>';
                  break;
                default:
              }
            }
            echo '</form></br>';

            echo '<form action="includes/deleteprofileimg.inc.php" method="POST" enctype="multipart/form-data">
            <button type="submit" name="submit">Delete Profile Avatar</button>';
            
            if (isset($_GET['delete'])) {
              switch($_GET['delete']){
                case 'success':
                  echo '<span class="form-span success">Image successfully deleted.</span>';
                  break;
                case 'error':
                  echo '<span class="form-span error">Image not deleted! There was an error.</span>';
                  break;
              }
            }
            echo '</form>';
          }
        }
        else {
          echo 'You are not logged in!'; // replace with a header to a login page
        }
      ?>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>