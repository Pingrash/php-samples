<?php
  include_once 'links.php';
  include_once 'header.php';
?>

<head>
  <title>OOP Calculator</title>
</head>

<body>
  <div class="main-container">
    <div class="container-fluid">
      <h3>Basic calculator made using Object Orientated PHP (OOP). Calculator itself is a class that is instatiated when calculate is pressed.</h3>
      <form action="includes/oopCalc.inc.php">
        <input type="text" name="num1" placeholder="Number 1">
        <input type="text" name="num2" placeholder="Number 2">
        <select name="cal">
          <option value="add">Add</option>
          <option value="sub">Subtract</option>
          <option value="mul">Multiply</option>
          <option value="div">Divide</option>
        </select>
        <button type="submit" name="calc-submit">Calculate</button>
      </form>

    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
</body>