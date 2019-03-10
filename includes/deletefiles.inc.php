<?php

// Take filenames from form
$fileNames = $_POST['filenames'];
// Remove any spaces from the input
$removeSpaces = str_replace(" ", "", $fileNames);
// Seperate out the file names from the commas
$allFileNames = explode(",", $removeSpaces);
// Count how many files there are to be deleted
$countAllNames = count($allFileNames);

for ($i=0; $i < $countAllNames; $i++) { 
  // Error handling for file not being found on server
  if (file_exists("../uploads/".$allFileNames[$i]) == false) {
    header("Location: ../deletefiles.php?error=notfound&file=".$allFileNames[$i]);
    exit();
  }
}

for ($i=0; $i < $countAllNames; $i++) { 
  $path = "../uploads/".$allFileNames[$i];
  // Delete the file (unlink)
  if (!unlink($path)) {
    header("Location: ../deletefiles.php?error=deletefail&file=".$allFileNames[$i]);
    exit();
  }
}

header("Location: ../deletefiles.php?success");