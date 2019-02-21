<?php
  include_once 'links.php';
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
  include_once 'includes/dbh.inc.php';
?>

<head>
  <title>Regular Expressions</title>
</head>

<div class="main-container">
  <div class="container-fluid">

    <h1>Regular Expressions</h1>

    <?php
      $string = "This is a sentence to be used as an example for regular expressions";
      
      echo '<div class="article-container">
      <h4><i>'.$string.'</i></h4>
      </div>';
      
    ?>

    <form action="regexp.php" class="search-form" method="POST">
      <h5>Use this search to use regular expressions to find if the word or series of letters you entered is present or not in the sentence above.</h5>
      <input type="text" name="search" placeholder="Enter search terms here">
      <button type="submit" name="submit-search">Search</button>
    </form>

    <?php
      if (isset($_POST['submit-search'])) {
        $search = $_POST['search'];
        echo $search;
        if (preg_match("/$search/", $string)) {
          echo '<p class="success">Found!</p>';
        } else {
          echo '<p class="error">Not Found!</p>';
        }
      }
    ?>

    <form action="regexp.php" method="post" class="search-form" style="padding-top: 1rem">
      <h5>Use this form to use regular expressions to find and replace a series of</h5>
      <input type="text" name="find" placeholder="Find">
      <input type="text" name="replace" placeholder="Replace with">
      <button type="submit" name="submit-replace" style="width: 180px">Find and replace</button>
    </form>

    <?php
      if (isset($_POST['submit-replace'])){
        $find = $_POST['find'];
        $replace = $_POST['replace'];

        $string = preg_replace("/$find/", $replace, $string);
        echo '<div class="article-container">
        <h4><i>'.$string.'</i></h4>
        </div>';
      }
    ?>

  </div> <!-- end container-fluid -->
</div> <!-- end main-container -->