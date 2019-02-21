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
        <h2>Reset your password</h2>
        <p>An email will be sent to you with instructions on how to reset your password.</p>

        <form action="includes/reset-request.inc.php" method="post">
          <div class="form-row align-items-center">
            <div class="col-auto">
              <label class="sr-only" for="emailInput">Email</label>
              <input type="email" class="form-control mb-2" id="emailInput" placeholder="Enter your email address..." name="email">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-2" name="reset-request-submit">Submit request</button>
            </div>
          </div>
        </form>
        <?php
          if (isset($_GET['reset']) == "success") {
            echo '<p class="success">Check your email!</p>';
          }
        ?>
      </div>
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->

</body>