<?php
  include_once 'links.php';
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
  include_once 'includes/dbh.inc.php';
?>

<head>
  <title>Articles</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
    
      <form action="search.php" method="POST" class="search-form">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit-search">Search</button>
      </form>

      <div class="article-container">
    
        <?php
          // Display searched for article
          if (isset($_GET['title']) && isset($_GET['date'])) {
            
            $title = mysqli_real_escape_string($conn, $_GET['title']);
            $date = mysqli_real_escape_string($conn, $_GET['date']);

            $sql = "SELECT * FROM article WHERE a_title='$title' AND a_date='$date';";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            // Echo all articles
            if ($queryResults > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="article-box">
                  <h3>'.$row['a_title'].'</h3>
                  <p>'.$row['a_text'].'</p>
                  <p>'.$row['a_author'].'</p>
                  <p>'.$row['a_date'].'</p>
                </div>';
              }
            }
          } else {

            // Default article page
            echo '<h1>All Articles</h1>';
            // Fetch all articles
            $sql = "SELECT * FROM article";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            // Echo all articles
            if ($queryResults > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="article-box">
                  <h3>'.$row['a_title'].'</h3>
                  <p>'.$row['a_text'].'</p>
                  <p>'.$row['a_author'].'</p>
                  <p>'.$row['a_date'].'</p>
                </div>';
              }
            }
          } 
        ?>
      </div> <!-- end article-container -->

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>