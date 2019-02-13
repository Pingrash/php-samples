<?php 

if (isset($_POST["contact-submit"])) {
  
  $contactEmail = $_POST['contactemail'];
  $firstName = $_POST['contactfirst'];
  $lastName = $_POST['contactlast'];
  $contactMessage = $_POST['contact-message'];

  if (empty($contactEmail) || empty($firstName) || empty($lastName)) {
    header('Location: ../contact.php?contact=empty');
    exit();
  }
  else {
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
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->SMTPAuth = $smtpAuth;
    $mail->SMTPSecure = $smtpSecure;
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->isHTML();
    $mail->Username = $mailUsername;
    $mail->Password = $mailPassword;
    $mail->SetFrom($mailFrom);
    $mail->addReplyTo($contactEmail);
    $mail->Subject = 'Contact form from '.$firstName.' '.$lastName;
    $mail->Body = '<p>Contact message recieved from  '.$firstName.' '.$lastName.'.</p><p>Their email - '.$contactEmail.'</p><p>'.$contactMessage.'</p>';
    $mail->AddAddress($contactRecieve);

    // Checks for successful email send
    if (!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
      header("Location: ../contact.php?contact=success");
      exit();
    }
  }
}
else {
  header("Location ../contact.php");
}