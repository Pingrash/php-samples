<?php

if (isset($_POST['reset-password-submit'])) {

  $selector = $_POST['selector'];
  $validator = $_POST['validator'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  // Checks for empty fields and password match errors
  if (empty($password) || empty($passwordRepeat)) {
    header("Location: ../create-new-password.php?newpwd=empty&selector=".$selector."&validator=".$validator);
    exit();
  } elseif ($password !== $passwordRepeat) {
    header("Location: ../create-new-password.php?newpwd=pwdnotsame&selector=".$selector."&validator=".$validator);
    exit();
  }

  $currentDate = date("U");

  require 'dbh.inc.php';

  // SQL statement to check that selector is valid and not expired
  $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires>=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error (Err01)!";
  } else {
    mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
    mysqli_stmt_execute($stmt);

    // Grab results and assign them to an array
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
      echo "You need to re-submit your request.";
      exit();
    } else {
      
      // hex2bin converts a hexidecimal number to a binary number
      $tokenBin = hex2bin($validator);
      // Need to verify binary token with the token in the database as it was hashed
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
      if ($tokenCheck === false) {
        echo "You need to re-submit your request";
        exit();
      } elseif ($tokenCheck === true) {
        
        $tokenEmail = $row["pwdResetEmail"];

        // SQL statement to select the user from the users database based on the email taken from the pwdreset table
        $sql = "SELECT * FROM users WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "There was an error (Err02)!";
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) {
            echo "There was an error (Err03)!";
            exit();
          } else {

            // SQL statement that updates the password for the user
            $sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "There was an error (Err04)!";
              exit();
            } else {
              // New password needs to be hashed before it enters the database
              $newHashedPwd = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ss", $newHashedPwd, $tokenEmail);
              mysqli_stmt_execute($stmt);
              
              // SQL statement that deletes the token from the pwdreset table so it can't be used again
              $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "There was an error (Err05)!";
                exit();
              } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?newpwd=success");

                // Close off connections (technically not necessary)
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                exit();
              }
            }
          }
        }
      }
    }
  }
} else {
  header("Location: ../index.php");
}
?>