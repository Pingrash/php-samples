<?php
  include 'links.php';
  include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Basic Calculator</title>
  </head>
  <body>

    <div class="main-container">
      <div class="container-fluid">

        <form action="basicCalc.php" method="get">
          <input type="text" name="num1" placeholder="1">
          <input type="text" name="num2" placeholder="2">
          <select name="operator">
            <option>None</option>
            <option>Add</option>
            <option>Subtract</option>
            <option>Multiply</option>
            <option>Divide</option>
          </select></br>
          <button type="submit" name="submit" value="submit">Submit</button>
        </form>
        <p>
          The answer is:
          <?php
            if (isset($_GET['submit'])) { // Checks to see if the submit button has been pressed
              $result1 = $_GET['num1'];
              $result2 = $_GET['num2'];
              $operator = $_GET['operator'];

              switch ($operator) {
                case 'None':
                  echo "You need to select a method for the calculation to work";
                  break;
                case 'Add':
                  echo $result1 + $result2;
                  break;
                case 'Subtract':
                  echo $result1 - $result2;
                  break;
                case 'Multiply':
                  echo $result1 * $result2;
                  break;
                case 'Divide':
                  echo $result1 / $result2;
                  break;
              }
            }
          ?>
        </p>
      </div>
    </div>
  </body>
</html>
