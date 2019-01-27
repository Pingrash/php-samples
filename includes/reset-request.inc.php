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

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error (err 02)";
      exit();
    }
    else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }

    require ('../PHPMailer/src/Exception.php');
    require ('../PHPMailer/src/PHPMailer.php');
    require ('../PHPMailer/src/SMTP.php');

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'mdmailto@gmail.com';
    $mail->Password = 'cup991?Pattern?';
    $mail->SetFrom('no-reply@mackenziedesigns.org');
    $mail->Subject = 'Reset your password for Mackenzie Designs account';
    $mail->Body = '<p>We recived a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p><p>Here is your password reset link: </br><a href="'.$url.'">'.$url.'</a></p>';
    $mail->AddAddress($userEmail);

    if (!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
      header("Location: ../reset-password.php?reset=success");

      mysqli_stmt_close($stmt);
      mysqli_close();

      exit();
    }
  }
  else {
    header("Location: ../index.php");
  }

?>