<?php
  include_once 'links.php';
  include_once 'header.php'; // inlcude_once will ensure the file will only be included once if it is included in one of the linked files as well.
  include_once 'includes/dbh.inc.php';
?>

<head>
<title>Search Results</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
      
      <!-- Back to articles button -->
      <form action="articles.php" method="POST">
        <button type="submit">Back to Articles</button>
      </form>

      <div class="article-container">
        <?php
          if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            // SQL statement that searchs all columns in the articles table to find any entries like the search terms
            $sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_text LIKE '%$search%' OR a_author LIKE '%$search%' OR a_date LIKE '%$search%';";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);
            
            if ($queryResult > 0) {
              // Echo the number of results
              echo '<p>There are '.$queryResult.' results!</p>';
              // Echo all articles that match the search
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="articles.php?title='.$row['a_title'].'&date='.$row['a_date'].'"><div class="article-box">
                <h3>'.$row['a_title'].'</h3>
                <p>'.$row['a_text'].'</p>
                <p>'.$row['a_author'].'</p>
                <p>'.$row['a_date'].'</p>
                </div></a>';
              }
            } else {
              echo 'There are no results matching your search!';
            }
          }
        ?>
      </div>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>