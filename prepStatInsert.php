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
          <?php
            // PHP checks the URL for each field value and if it is set, sets the value of the field to the value in the URL.
            // This means the user will not have to reenter every single field whenever a mistake is made. Password field is always reset for security reasons.

            // First name field
            if (isset($_GET['first'])) {
              $first = $_GET['first'];
              echo'<input type="text" name="first" placeholder="First name" value="'.$first.'"></br>';
            }
            else {
              echo '<input type="text" name="first" placeholder="First name"></br>';
            }
            
            // Last name field
            if (isset($_GET['last'])) {
              $last = $_GET['last'];
              echo'<input type="text" name="last" placeholder="Last name" value="'.$last.'"></br>';
            }
            else {
              echo '<input type="text" name="last" placeholder="Last name"></br>';
            }

            // Email field
            if (isset($_GET['email'])) {
              $email = $_GET['email'];
              echo'<input type="text" name="email" placeholder="Email" value="'.$email.'"></br>';
            }
            else {
              echo '<input type="text" name="email" placeholder="Email"></br>';
            }

            // Username field
            if (isset($_GET['uid'])) {
              $uid = $_GET['uid'];
              echo'<input type="text" name="uid" placeholder="Username" value="'.$uid.'"></br>';
            }
            else {
              echo '<input type="text" name="uid" placeholder="Username"></br>';
            }

            // Password field
            echo '<input type="password" name="pwd" placeholder="Password"></br>';

            // Submit button
            echo '<button type="submit" name="submit">Sign-Up</button>';
          ?>  
        </form>
        <?php	
          if (isset($_GET['signup'])) {

            $signupCheck = $_GET['signup'];

            if ($signupCheck == "empty") {
              echo "<p class='error'>You did not enter all fields!</p>";
              exit();
            }
            elseif ($signupCheck == "char") {
              echo "<p class='error'>You used invalid characters!</p>";
              exit();
            }
            elseif ($signupCheck == "invalidemail") {
              echo "<p class='error'>You used an invalid email!</p>";
              exit();
            }
            elseif ($signupCheck == "success") {
              echo "<p class='success'>You have been signed up!</p>";
            }
          }
        ?>

        <div class="div-section">
          <p style="padding-top: 1rem;">User IDs in database:</p>

          <?php
            // Displays all uid's in the table. Only here as an easy way to tell that the signup worked.
            $sql = "SELECT * FROM usertest;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['user_uid'] . "</br>";
              }
            }
          ?>
        </div>

        <div class="div-section">
          <h2>Hashing and Dehashing</h2>
          <p>The following will show the password as entered, the hashed password and the return from the function that dehashes the password.</p>
          <?php
            $input = "test123";
            $hashedPwdInDb = password_hash($input, PASSWORD_DEFAULT);
            
            echo '<p>Example Input: ' .$input. '</p>';
            echo '<p>Hashed version of password in the database: ' .$hashedPwdInDb. '</p>';
            echo '<p>Return value after dehashing: ' .password_verify($input, $hashedPwdInDb). '</p>';
          ?>
        </div>
      </div>
    </div>
  </body>
</html>