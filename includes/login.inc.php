<?php

  if (isset($_POST['login-submit'])) {
    
    require 'dbh.inc.php';

    // Set variables from login form
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    // Checks for empty fields
    if (empty($mailuid) || empty($password)) {
      header("Location: ../index.php?error=emptyfields&email=".$mailuid);
      exit();
    }
    else {

      // Prepare SQL statement to check for database matches to entered uid and email
      $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";

      // Establish connection to database
      $stmt = mysqli_stmt_init($conn);

      // Check for SQL statement validity
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
      }
      else {

        // Bind form input variables to the prepared SQL statement
        mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);

        // Send completed SQL statement to the database
        mysqli_stmt_execute($stmt);

        // Set returned data to variable
        $result = mysqli_stmt_get_result($stmt);

        // Associates the returned data to $row
        if ($row = mysqli_fetch_assoc($result)) {
          
          // Compares the entered password to the hashed password on the database, returns either 0 (false) or 1 (true)
          $pwdCheck = password_verify($password, $row['pwdUsers']);
          
          // Error handler if entered password does not match the database
          if ($pwdCheck == false) {
            header("Location: ../index.php?error=wrongpwd");
            exit();
          }
          elseif ($pwdCheck == true) {

            // Starts a session and assigns the users Id and Uid to SESSION storage for use throughout the website
            session_start();
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['userUid'] = $row['uidUsers'];

            header("Location: ../index.php?login=success");
            exit();
          }
          else {
            header("Location: ../index.php?error=wrongpwd");
            exit();
          }
        }
        else {
          header("Location: ../index.php?error=nouser");
          exit();
        }
      }
    }

  }
  else {
    header("Location: ../index.php");
    exit();
  }

?>