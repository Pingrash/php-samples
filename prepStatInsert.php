<?php
  include_once 'links.php';
  include 'header.php';
  include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Prepared Statement Database Insert</title>
</head>
<body>
  <div class="main-container">
    <div class="container-fluid">
      <p>The INSERT SQL statement on this page uses prepared statements. See the source file on how.</p>
      <form action="includes/signupPrep.inc.php" method="POST">
        <p class="form-p">Enter a new user into the Database:</p>
        <input type="text" name="first" placeholder="FirstName"></br>
        <input type="text" name="last" placeholder="LastName"></br>
        <input type="text" name="email" placeholder="Email"></br>
        <input type="text" name="uid" placeholder="User ID"></br>
        <input type="password" name="pwd" placeholder="Password"></br>
        <button type="submit" name="submit">Sign-Up</button>
      </form>

      <p style="padding-top: 1rem;">User IDs in database:</p>

      <?php
        // Displays all uid's in the table. Only here as an easy way to tell that the signup worked.
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['user_uid'] . "</br>";
          }
        }
      ?>
    </div>
  </div>
</body>
</html>