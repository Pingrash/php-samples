<?php
  session_start();
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="index.php">MACKENZIE DESIGNS</a>

      <?php
      // Fetch profile image
      if (isset($_SESSION['userId'])) {
        $id = $_SESSION['userId'];
        $sql = "SELECT * FROM profileimg WHERE userid='$id';";
        $resultImg = mysqli_query($conn, $sql);
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
          echo '<li class="nav-profile-li"><a href="profile.php">';
          if ($rowImg['status'] == 0) {
            echo '<img src="uploads/profile'.$id.'.'.$rowImg['ext'].'?'.mt_rand().'" class="nav-profile-img">';
            // mt_rand is used to add a random number to the end of the file forcing the browser to update as if it was just the same name as before the old image may be cached
          } else {
            // Set default profile image if user has not set one
            echo '<img src="uploads/defaultprofile.jpg" class="nav-profile-img">';
          }
          // Close off the tags
          echo '</a></li>';
        }
      }
      ?>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PHP Projects</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="basicCalc.php">Basic Calculator</a>
              <a class="dropdown-item" href="basicDatabaseQuery.php">Basic Database Query</a>
              <a class="dropdown-item" href="prepStatQuery.php">Prepared Statement Query</a>
              <a class="dropdown-item" href="prepStatInsert.php">Prepared Statement Insert</a>
              <a class="dropdown-item" href="profile.php">Profile Page</a>
              <a class="dropdown-item" href="deletefiles.php">Delete Files</a>
              <a class="dropdown-item" href="articles.php">Articles</a>
              <a class="dropdown-item" href="regexp.php">Regular Expressions</a>
              <a class="dropdown-item" href="uniquestrings.php">Unique Strings</a>
              <a class="dropdown-item" href="classes.php">Classes (OOP)</a>
            </div>
          </li>
          <div class="dropdown-divider"></div>
        </ul>
        <?php
          // Set login form is user is not logged in
          if (!isset($_SESSION['userId'])) {
            echo '<div class="dropdown" id="login-btn">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
              Login
            </button>
            <div class="dropdown-menu dropdown-menu-lg-right">
              <form class="px-4 py-3" action="includes/login.inc.php" method="post">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" name="mailuid" placeholder="email@example.com">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="pwd" placeholder="Password">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">
                      Remember me
                    </label>
                  </div>
                </div>';
            echo '<input type="hidden" name="page" value='.$_SERVER['REQUEST_URI'].'>';
            echo '<button type="submit" class="btn btn-primary" name="login-submit">Sign in</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="signup.php">New around here? Sign up</a>
              <a class="dropdown-item" href="reset-password.php">Forgot password?</a>
            </div>';
          }
          // Set logout button if user is logged in
          elseif (isset($_SESSION['userId'])) {
            echo '<span class="navbar-text loggedinas">Logged in as: '
            .$_SESSION['userUid'].
            '</span>';
            echo '<div id="logout-btn">
            <form action="includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-primary" name="logout-submit">Logout</button>
            </form>
            </div>';
          }
        ?>
        </div>
      </div>
    </nav>
  </header>
</body>
</html>
