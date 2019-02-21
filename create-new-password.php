<?php
  include_once 'links.php';
  include 'header.php';
?>

<head>
  <title>Reset Password Request</title>
</head>

<body>
  
  <div class="main-container">
    <div class="container-fluid">
      <div class="mx-auto" style="width: 60%;">
        <?php
          $selector = $_GET['selector'];
          $validator = $_GET['validator'];

          if (empty($selector) || empty($validator)) {
            echo "Could not validate your request!";
          } else {
            // Checks for valid selector and token
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {

              // Error messages for various errors
              if (isset($_GET['newpwd']) == "empty") {
                echo '<p class="error">Fill in all fields!</p>';
              } elseif (isset($_GET['newpwd']) == "pwdnotsame") {
                echo '<p class="error">Passwords did not match!</p>';
              }
              ?>

              <h2>Reset your password</h2>
              <p>An email will be sent to you with instructions on how to reset your password.</p>
              <form action="includes/reset-password.inc.php" method="post">
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">

                    <label class="sr-only" for="pwdInput">Password</label>
                    <input type="password" class="form-control mb-2" id="pwdInput" placeholder="Enter a new password..." name="pwd">

                    <label class="sr-only" for="pwdRepeatInput">Re-Enter Password</label>
                    <input type="password" class="form-control mb-2" id="pwdRepeatInput" placeholder="Repeat new password..." name="pwd-repeat">

                    <button type="submit" class="btn btn-primary mb-2" name="reset-password-submit">Reset Password</button>
                  </div>
                </div>
              </form>



              <?php
            
            }
          }
        ?>
              
        <?php
          if (isset($_GET['reset']) == "success") {
            echo '<p class="success">Check your email!</p>';
          }
        ?>
      </div>
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->

</body>