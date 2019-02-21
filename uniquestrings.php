<?php
  include_once 'links.php';
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
  include_once 'includes/dbh.inc.php';
?>

<head>
  <title>Unique Strings</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
    
      <?php
        function generateKey(){
          $keyLength = 8;
          $string = "1234567890abcdefghijklmnopqrstuvwxyz()/$";
          $randString = substr(str_shuffle($string), 0, $keyLength);
          return $randString;
        } 

        function generateUniqueKey(){
          $uniqueString = uniqid();
          return $uniqueString;
        }

        echo '<p>'.generateKey().'</p>';
        echo '<p>'.generateUniqueKey().'</p>';
      ?>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>