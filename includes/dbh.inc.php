<?php

// Order of the variables is the same as they would be set in the mysqli_connect function
$dbServername = "localhost"; // XAMPP servername
$dbUsername = "root"; // XAMPP username
$dbPassword = ""; // No password as none set in XAMPP right now
$dbName = "loginsystem"; // Name of the database

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}