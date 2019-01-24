<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">MACKENZIE DESIGNS</a>
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
            </div>
          </li>
          <div class="dropdown-divider"></div>
        </ul>
        <div class="dropdown" id="login-btn">
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
              </div>
              <button type="submit" class="btn btn-primary" name="login-submit">Sign in</button>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="signup.php">New around here? Sign up</a>
            <a class="dropdown-item" href="#">Forgot password?</a>
          </div>
          <div id="logout-btn">
            <!-- <form action="includes/logout.inc.php" method="post">
              <button type="submit" class="btn btn-primary" name="logout-submit">Logout</button>
            </form> -->
          </div>
        </div>
      </div>
    </nav>
  </header>
</body>
</html>
