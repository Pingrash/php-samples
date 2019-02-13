<?php

$fileNames = $_POST['filenames'];
$removeSpaces = str_replace(" ", "", $fileNames);
$allFileNames = explode(",", $removeSpaces);
$countAllNames = count($allFileNames);

for ($i=0; $i < $countAllNames; $i++) { 
  if (file_exists("../uploads/".$allFileNames[$i]) == false) {
    header("Location: ../deletefiles.php?error=notfound&file=".$allFileNames[$i]);
    exit();
  }
}

for ($i=0; $i < $countAllNames; $i++) { 
  $path = "../uploads/".$allFileNames[$i];
  if (!unlink($path)) {
    header("Location: ../deletefiles.php?error=deletefail&file=".$allFileNames[$i]);
    exit();
  }
}

header("Location: ../deletefiles.php?success");