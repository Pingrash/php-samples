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
        </form>
      </div>
    </div> <!-- container-fluid -->
  </div> <!-- main-container -->
</body>
</html>