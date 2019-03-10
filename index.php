<?php
  include_once 'links.php';
  include_once 'header.php'; // include_once will ensure the file will only be included once if it is included in one of the linked files as well.
?>

<head>
  <title>Home</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
      
      <?php
        if (isset($_SESSION['userId'])) {
          echo '<p>You are logged in as '.$_SESSION['userUid'].'</p>';
        }
        else {
          echo '<p>You are not logged in!</p>';
        }
      ?>
      
      <h2>Projects</h2>
      <dl>
        <dt><a href="basicCalc.php">Basic Calculator</a></dt>
        <dt><a href="basicDatabaseQuery.php">Basic Database Query</a></dt>
        <dt><a href="profile.php">Profile Page</a></dt>
        <dt><a href="login.php">Login Page</a></dt>
        <dt><a href="contact.php">Contact Page</a></dt>
        <dt><a href="deletefiles.php">Delete Files</a></dt>
        <dt><a href="articles.php">Articles</a></dt>
        <dt><a href="regexp.php">Regular Expressions</a></dt>
        <dt><a href="uniquestrings.php">Unique Strings</a></dt>
        <dt><a href="advancedcalc.php">Advanced Calculator</a></dt>
        <dt>Prepared Statements</dt>
        <dd>- <a href="prepStatQuery.php">Query</a></dd>
        <dd>- <a href="prepStatInsert.php">Insert</a></dd>
        <dt>Object Orientated PHP (OOP)</dt>
        <dd>- <a href="classes.php">Classes</a></dd>
        <dd>- <a href="oopCalc.php">OOP Calculator</a></dd>
      </dl>
    
      <?php
        // Welcome 
        if (isset($_SESSION['userUid'])) {
          echo '<div class="index-welcome">';
          echo "<p>Today is ".date("l")."</p>"; // date(l) will return the current day as a string
          echo '<p>Hi there '.$_SESSION['userUid'].'!</p>';
          echo '</div>';
        }
      ?>
      
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->  
</body>