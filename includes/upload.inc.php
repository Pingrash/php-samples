<?php

if (isset($_POST['submit'])) {
  
  // Sets the info data for the file into an array
  $file = $_FILES['file'];

  // Set variables for different parts of the file information
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name']; // The temp location of the file on the server
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  // Explode at the period to make an array
  $fileExt = explode('.', $fileName);
  // Set the file name from the end of the explode array, forcing into lowercase
  $fileActualExt = strtolower(end($fileExt));

  // An array of allowed file extentions for the task
  $allowed = array('jpg', 'jpeg', 'png');

  // Checks for errors
  if (!in_array($fileActualExt, $allowed)) {
    header("Location: ../profile.php?error=ext");
    exit();
  } else {
    if (!$fileError === 0) {
      header("Location: ../profile.php?error=upload");
      exit();
    } else {
      if ($fileSize > 1000000) { // 1000000 bytes = 1mb
        header("Location: ../profile.php?error=size");
        exit();
      } else {
        // Creates a unique ID for the file seeded on the current time and concat the file extension to create a new file name
        $fileNameNew = uniqid('', true). "." .$fileActualExt;

        // The destination that the file will be sent to
        $fileDestination = '../uploads/'.$fileNameNew;

        // Move the file to the new location
        move_uploaded_file($fileTmpName, $fileDestination);

        header("Location: ../profile.php?success");
        exit();
        
      }
    }
  }
    
  
      
  

  
      
}