<?php
  include_once 'links.php';
  include 'header.php';
  include 'includes/newclass.inc.php';
  include 'includes/userclass.inc.php';
?>

<head>
  <title>Classes (OOP)</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">

      <div class="classes-user">
        <?php
          $user1 = new User('Lachlan', 'Mackenzie', 'Blond', 'Blue');
          echo '<p>User Name: '.$user1->fullName().'</p>';
          echo '<p>User Hair Color: '.$user1->hairColor.'</p>';
          echo '<p>User Eye Color: '.$user1->eyeColor.'</p>';
        ?>
      </div>

      <div class="classes-user">
        <?php
          $user2 = new User('Amy', 'Mackenzie', 'Brown', 'Brown');
          echo '<p>User Name: '.$user2->fullName().'</p>';
          echo '<p>User Hair Color: '.$user2->hairColor.'</p>';
          echo '<p>User Eye Color: '.$user2->eyeColor.'</p>';
        ?>
      </div>
      


    <!-- Basic class stuff -->
    <?php
      /*
      $object1 = new NewClass;
      $object2 = new NewClass;
      $object3 = new NewClass;

      echo $object2;

      echo '<p>'.$object1->name().'</p>';

      echo '<p>$object3 is going to be unset</p>';
      unset($object3);

      $object1->setNewProperty("This is the new data");

      echo '<p>'.$object1->getProperty().'</p>';

      $object2->setNewProperty("This is the new data for object 2");

      echo '<p>'.$object2->getProperty().'</p>';
      */
    ?>

    <!--<div>
      <?php
        //echo '<p>'.NewClass::$static.'</p>';  
      ?>
    </div>
    -->
    
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>