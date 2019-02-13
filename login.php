<?php
  include_once 'links.php';
  include_once 'header.php';
?>

<head>
  <title>Login</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">

      <div class="loginform">
        <h1>Login</h1>

        <?php
          // Various messages to be displayed based on success and error in the URL
          if (isset($_GET['error'])) {
            switch ($_GET['error']) {
              case "emptyfields":
                echo '<p class="error">Fill in all fields!</p>';
                break;
              case "invalidemailuid":
                echo '<p class="error">Invalid email and username!</p>';
                break;
              case "invalidemail":
                echo '<p class="error">Invalid email!</p>';
                break;
              case "invaliduid":
                echo '<p class="error">Invalid username!</p>';
                break;
              case "sqlerror":
                echo '<p class="error">SQL error!</p>';
                break;
              case "wrongpwd":
                echo '<p class="error">Wrong password!</p>';
                break;
              case "nouser":
                echo '<p class="error">No user found!</p>';
                break;
            }
          }
        ?>

        <form class="px-4 py-3" action="includes/login.inc.php" method="post">
          <div class="form-group">
            <label for="FormEmail">Email address</label>
            <input type="email" class="form-control" id="FormEmail" name="mailuid" placeholder="email@example.com">
          </div>
          <div class="form-group">
            <label for="FormPassword">Password</label>
            <input type="password" class="form-control" id="FormPassword" name="pwd" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="FormCheck">
              <label class="form-check-label" for="FormCheck">
                Remember me
              </label>
            </div>
          </div>
          <input type="hidden" name="page" value="../index.php">
          <button type="submit" class="btn btn-primary" name="login-submit">Sign in</button>
        </form>
      </div>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>