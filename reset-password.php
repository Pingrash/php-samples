<?php
  include_once 'links.php';
  include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reset Password Request</title>
</head>
<body>
  
  <div class="main-container">
    <div class="container-fluid">
      <div class="mx-auto" style="width: 60%;">
        <h2>Reset your password</h2>
        <p>An email will be sent to you with instructions on how to reset your password.</p>

        <form action="includes/reset-request.inc.php" method="post">
          <div class="form-row align-items-center">
            <div class="col-auto">
              <label class="sr-only" for="inlineFormInput">Email</label>
              <input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Enter your email address..." name="email">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-2" name="reset-request-submit">Submit request</button>
            </div>
          </div>
        </form>
        <?php
          if ($_GET['reset'] == "success") {
            echo '<p class="success">Check your email!</p>';
          }
        ?>
      </div>
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->

</body>
</html>