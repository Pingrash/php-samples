<?php
  include_once 'links.php';
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
?>

<body>
  <div class="main-container">
    <div class="container-fluid">

      <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
        <?php
          if (isset($_GET['success'])) {
            echo '<sub class=success>"Upload successfull"</sub>';
          }
          if (isset($_GET['error'])) {
            switch ($_GET['error']) {
              case 'ext':
                echo '<sub class=error>"Invalid file extension! .jpg, .jpeg and .png only."</sub>';
                break;
              case 'upload':
                echo '<sub class=error>"There was an error uploading your file!"</sub>';
                break;
              case 'size':
                echo '<sub class=error>"File size too large! File must be no larger than 1mb."</sub>';
                break;
              default:
            }
          }
        ?>
      </form>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>