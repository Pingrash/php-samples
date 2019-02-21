<?php
  include_once 'links.php';
  include 'header.php';
  include 'includes/newclass.inc.php';

  $object1 = new NewClass;
?>

<head>
  <title>Classes (OOP)</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
    
    <?php
      //echo $object1->$info;
      echo '<p>'.$object1->name().'</p>';
    ?>
    
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>