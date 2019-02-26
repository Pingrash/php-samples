<?php

if (isset($_POST['calc-submit'])) {

  require "class/oopCalc.class.php";

  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $cal = $_POST['cal'];

  $calculator = new Calc($num1, $num2, $cal);
  echo $calculator->calcMethod();

} else {
  header("Location: ../oopCalc.php");
  exit();
}