<?php
  if (isset($_POST['signup-submit'])) {
    
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // Check to see if any fields were not completed
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
      exit();
    }
    // Checks for both email and username validity at once
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invalidemailuid");
      exit();
    }
    // Check to see if email is valid
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidemail&uid=".$username);
      exit();
    }
    // Check for invalid characters in the username
    // The accepted characters are in the square brackets
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invaliduid&email=".$email);
      exit();
    }
    // Checks that the input in both password fields match
    elseif ($password !== $passwordRepeat) {
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
      exit();
    }
    else {
      
      // Prepares an SQL statement to select any user uid matching the input
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";

      // Establish connection to the database
      $stmt = mysqli_stmt_init($conn);

      // Checks the prepared statement is valid
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
      }
      else {
        // Set the placeholder in the $stmt variable to string(s)  $username
        mysqli_stmt_bind_param($stmt, "s", $username);

        // Sends the now complete SQL statement to database
        mysqli_stmt_execute($stmt);

        // Stores the result from the database into the $stmt variable, overriding the old value as no longer needed
        mysqli_stmt_store_result($stmt);

        // Sets the number of rows in the result as an integer
        $resultCheck = mysqli_stmt_num_rows($stmt);

        // Checks if there was more than 0 rows in $resultCheck, if the integer is more than 0 than the username is already set to another user
        // Technically $resultCheck should only have a value of either 0 or 1 as we are not allowing duplicate usernames through this check
        if ($resultCheck > 0) {
          header("Location: ../signup.php?error=usertaken&email=".$email);
          exit();
        }
        else {
          
          // Prepares an insert SQL statement to add the new user
          $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";

          // Establish connection to database
          $stmt = mysqli_stmt_init($conn);

          // Checks validity of the prepared statement
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
          }
          else {

            // Hashes the password using the default method (bcrypt)
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            // Set the placeholders in the $stmt variable to the variables holding the form data
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);

            // Sends the now complete SQL statement to database
            mysqli_stmt_execute($stmt);

            // SQL Statement to select the id that was set for the new user in users for use in another insert statement for the profileimg table
            $sql = "SELECT * FROM users WHERE uidUsers = '$username' AND emailUsers = '$email';";
            $resultQuery = mysqli_query($conn, $sql);

            if (mysqli_num_rows($resultQuery) < 0) {
              header("Location: ../signup.php?error=sqlerror");
              exit();
            }
            else {
              while ($row = mysqli_fetch_assoc($resultQuery)) {
                $userId = $row['idUsers'];
                // SQL statement to insert the user into the profileimg table
                // status is set to 1 as the user cannot set their profile picture on signup
                $sql = "INSERT INTO profileimg (userid, status) VALUES (?, 1);";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ../signup.php?error=sqlerror");
                  exit();
                }
                else {
                  mysqli_stmt_bind_param($stmt, "i", $userId);
                  mysqli_stmt_execute($stmt);

                  header("Location: ../signup.php?signup=success");
                  exit();
                }
              }
            }
          }
        }
      }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  }
  else {
    header("Location: ../signup.php");
    exit();
  }
?>