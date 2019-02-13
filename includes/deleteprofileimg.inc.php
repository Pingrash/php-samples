<?php
session_start();
include_once 'dbh.inc.php';

$sessionid = $_SESSION['userId'];

$filename = "uploads/profile".$sessionid.".*";

$sql = "SELECT ext FROM profileimg WHERE userid='$sessionid';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ext = $row['ext'];

$filename = "../uploads/profile".$sessionid.".".$ext;

$sql = "UPDATE profileimg SET status=1, ext=null WHERE userid='$sessionid';";
mysqli_query($conn, $sql);

if (!unlink($filename)) {
  header("Location: ../profile.php?delete=error");
} else {
  header("Location: ../profile.php?delete=success");
}

/*
mmtuts way:

$filename = "uploads/profile".$sessionid."*";
$fileinfo = glob($filename);
fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];

*/