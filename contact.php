<?php
  include_once 'links.php';
  include 'header.php';
?>

<head>
  <title>Contact</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
      <div class="contact-form">
        <form class="px-4 py-3" action="includes/contact.inc.php" method="post">
          <div class="form-group">
            <h1>Contact Form</h1>
            <?php
              if (isset($_GET['contact'])) {
                switch($_GET['contact']){
                  case "empty":
                    echo '<p class="error">Please fill in all fields';
                    break;
                  case "success":
                    echo '<p class="success">Contact email sent successfully! We will get back to you as soon as we can.</p>';
                    break;
                }
              }
            ?>

            <label for="ContactEmail">Email address</label>
            <input type="email" class="form-control" id="ContactEmail" name="contactemail" placeholder="email@example.com">
          </div>
          <div class="form-group">
            <label for="ContactFirst">First Name</label>
            <input type="text" class="form-control" id="ContactFirst" name="contactfirst" placeholder="Firstname">

            <label for="ContactLast">Last Name</label>
            <input type="text" class="form-control" id="ContactLast" name="contactlast" placeholder="Lastname">

          </div>
          <div class="form-group">
            <textarea placeholder="Type your message here" name="contact-message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="contact-submit">Submit</button>
        </form>
      </div> <!-- end contact-form-->
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>