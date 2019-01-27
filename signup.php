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
  <title>Signup</title>
</head>
<body>
  <div class="main-container">
    <div class="container-fluid">
      <div class="mx-auto" style="width: 50%;">
        <h1>Sign Up</h1>
        <?php
          if (isset($_GET['error'])) {
            if (isset($_GET['error']) == "emptyfields") {
              echo '<p class="error">Fill in all fields!</p>';
            }
            elseif (isset($_GET['error']) == "invalidemailuid") {
              echo '<p class="error">Invalid email and username!</p>';
            }
            elseif (isset($_GET['error']) == "invalidemail") {
              echo '<p class="error">Invalid email!</p>';
            }
            elseif (isset($_GET['error']) == "invaliduid") {
              echo '<p class="error">Invalid username!</p>';
            }
            elseif (isset($_GET['error']) == "passwordcheck") {
              echo '<p class="error">Your passwords did not match!</p>';
            }
            elseif (isset($_GET['error']) == "sqlerror") {
              echo '<p class="error">SQL error!</p>';
            }
            elseif (isset($_GET['error']) == "usertaken") {
              echo '<p class="error">Username is already taken!</p>';
            }
          }
          elseif (isset($_GET['signup']) == "success") {
            echo '<p class="success">Signup successful!</p>';
          }
        ?>
        <form action="includes/signup.inc.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="emailInput">Email</label>
              <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="uidInput">Username</label>
              <input type="text" name="uid" class="form-control" id="uidInput" placeholder="Username">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="pwdInput">Password</label>
              <input type="password" name="pwd" class="form-control" id="pwdInput" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
              <label for="pwd-repeatInput">Repeat Password</label>
              <input type="password" name="pwd-repeat" class="form-control" id="pwd-repeatInput" placeholder="Repeat password">
            </div>
          </div>
          <button type="submit" name="signup-submit" class="btn btn-primary">Sign Up</button>
          <a href="reset-password.php">Forgot your password?</a>
        </form>
      </div>
    </div> <!-- container-fluid -->
  </div> <!-- main-container -->
</body>
</html>