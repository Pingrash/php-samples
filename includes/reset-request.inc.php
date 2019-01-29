<?php

  if (isset($_POST['reset-request-submit'])) {
    
    // Creates 8 random bytes and converts them to a hexidecimal number
    $selector =  bin2hex(random_bytes(8));

    // Creates 32 random bytes, will be hashed later
    $token = random_bytes(32);

    // URL for the user to be directed to
    $url = "localhost/phplessons/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);

    // Expiry for the token. This sets it as 1800 seconds after the current date and time of creation (30mins)
    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST['email'];

    // SQL statement that deletes any existing tokens in the pwdreset table to ensure there is only one at all times
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error (err 01)";
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $userEmail);
      mysqli_stmt_execute($stmt);
    }

    // SQL statement to insert the new token into the pwdreset table
    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error (err 02)";
      exit();
    }
    else {
      // Token is hashed before it goes to the database for security
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }

    // Sets up mailserver connection and email, then sends the email
    require ('mailer.inc.php');
    require ('../PHPMailer/src/Exception.php');
    require ('../PHPMailer/src/PHPMailer.php');
    require ('../PHPMailer/src/SMTP.php');

    /*
      mailer.inc.php will need to be created or variables set in this file for email to work. File left ignored for security purposes.
      The file will need the following variables:
      $smtpAuth, $smtpSecure, $host, $port, $mailUsername, $mailPassword, $mailFrom.
    */

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->$smtpAuth;
    $mail->SMTPSecure = $smtpSecure;
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->isHTML();
    $mail->Username = $mailUsername;
    $mail->Password = $mailPassword;
    $mail->SetFrom($mailFrom);
    $mail->Subject = 'Reset your password for Mackenzie Designs account';
    $mail->Body = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p><p>Here is your password reset link: </br><a href="'.$url.'">'.$url.'</a></p>';
    $mail->AddAddress($userEmail);

    // Checks for successful email send
    if (!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
      header("Location: ../reset-password.php?reset=success");

      mysqli_stmt_close($stmt);
      mysqli_close($conn);

      exit();
    }
  }
  else {
    header("Location: ../index.php");
  }

?>