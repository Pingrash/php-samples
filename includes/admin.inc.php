<?php

// A short script for inclusion on pages meant for admin access only. Redirects the user back to the index page if they try to manually enter it
// Make sure to only include it immediatly after links.php to work properly
if (isset($_SESSION['userId'])) {
  if ($_SESSION['userId'] !== 6) {
    header("Location: index.php");
    exit();
  } 
} else {
  header("Location: index.php");
  exit();
}

?>