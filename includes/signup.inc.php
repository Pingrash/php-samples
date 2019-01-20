<?php
  include_once 'dbh.inc.php';

  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']); 
  // this version does not hash the password for security, will learn about that later.
  // mysqli_real_escape_string converts the input from the form into a string. This prevents SQL inject attacks as attackers can type SQL code into the input fields and if it gets to the database as code can cause sever damage. ALWAYS DO THIS!!!

  $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$pwd');";

  mysqli_query($conn, $sql);

  header("Location: ../index.php?signup=success"); // loads the index page upon success.
?>