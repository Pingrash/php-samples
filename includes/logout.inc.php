<?php

  // Check to see if the logout button has actually been pressed
  if (!isset($_POST['logout-submit'])) {
    header("Location: ../index.php");
  }
  else {
    
    session_start();

    // Clear all variables stored in session
    session_unset();

    // Destroys all user sessions currently running on the site
    session_destroy();

    header("Location: ../index.php");
  }

?>