<?php
  // if statement to handle wether the user submited the form or entered the page by entering the page URL. If the submit button was not pressed the user will be sent back to the index page.
  if (isset($_POST['submit'])){
    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']); 
    // This version does not currently hash the password for security, will learn about that later.
    // mysqli_real_escape_string converts the input from the form into a string. This prevents SQL inject attacks as attackers can type SQL code into the input fields and if it gets to the database as code can cause sever damage. ALWAYS DO THIS!!!

    // if statement to check that all variables are not empty. If any of them are empty than user will be sent back to the index page.
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
      header("Location: ../prepStatInsert.php?signup=empty");
      exit();
    } else {
      // if statement to check for invalid characters in the first and last name variables.
      if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
        header("Location: ../prepStatInsert.php?signup=char&email=$email&uid=$uid");
        exit();
      } else {
        // if statement to check if the email address is valid. Will send the user back to the index page if not valid.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../prepStatInsert.php?signup=invalidemail&first=$first&last=$last&uid=$uid");
          exit();
        } else {
          $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?, ?, ?, ?, ?);";
          $stmt = mysqli_stmt_init($conn);
          
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Sends the user back to the index page
            header("Location: ../prepStatInsert.php?signup=sqlerror");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $pwd);
            mysqli_stmt_execute($stmt);

            header("Location: ../prepStatInsert.php?signup=success"); // loads the index page upon success.
            exit();
          }
        }
      }   
    } 
  }
?>