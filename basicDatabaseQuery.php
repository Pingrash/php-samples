<?php
  include_once 'links.php';
  include 'header.php';
  include 'includes/dbh.inc.php';
?>

<head>
  <title>Basic Database Query</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
      <p>User IDs within user table of the database:</br>
        <?php
          $sql = "SELECT * FROM usertest;"; // sets a SELECT SQL code to the variable that can be called to grab all data from users. Semicolon after users is for the SQL statement.
          $result = mysqli_query($conn, $sql); // $conn (set in dbh.inc.php) connects to the database. $sql sends the SQL statement that grabs all data from users, then sets it to $result.
          $resultCheck = mysqli_num_rows($result); // optional but recommended. Returns the number of rows in the SQL query.

          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { // sets all results within $result to $row as an array of rows.
              echo $row['user_uid'] . "</br>"; // echos all uid's in users. br tag is to make them all appear on a new line.
            }
          }
        ?>
      </p>

      <form action="includes/signup.inc.php" method="POST">
        Enter a new user into the Database:</br>
        <input type="text" name="first" placeholder="FirstName"></br>
        <input type="text" name="last" placeholder="LastName"></br>
        <input type="text" name="email" placeholder="Email"></br>
        <input type="text" name="uid" placeholder="User ID"></br>
        <input type="password" name="pwd" placeholder="Password"></br>
        <button type="submit" name="submit">Sign-Up</button>
      </form>
    </div>
  </div>
</body>