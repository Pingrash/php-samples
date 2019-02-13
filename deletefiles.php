<?php
  include_once 'links.php';
  include 'header.php';
?>

<head>
  <title>Delete Files</title>
</head>

<body>
  
<div class="main-container">
  <div class="container-fluid">
    <h1>Delete Files</h1>
    <p>This form can be used to delete files from the uploads folder for the website.</p>
    <p>Each file name that needs to be deleted needs to be entered in the field with a comma between each one. PHP script uses the commas as explode points. A space after each comma is ok as script will remove them.</p>

    <div id="deleteform">
      <form action="includes/deletefiles.inc.php" method="post">
        <input type="text" name="filenames" placeholder="Seperate each name with a comma (,)" style="width: 280px;">
        <button type="submit" name="submit">Delete files</button>
      </form>

      <?php
        if (isset($_GET["error"])) {
          switch($_GET["error"]){
            case "notfound":
              $fileName = $_GET["file"];
              echo '<p class="error">'.$fileName.' not found on server!</p>';
              break;
            case "deletefail":
              $fileName = $_GET["file"];
              echo '<p class="error">There was an error deleting '.$fileName.'</p>';
              break;
          }
        }

        if (isset($_GET["success"])) {
          echo '<p class=success>Files deleted successfully!</p>';
        }
      ?>
    </div> <!-- end deleteform -->

  </div> <!-- end container-fluid -->
</div> <!-- end main-container -->

</body>