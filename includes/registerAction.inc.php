<?php

include_once 'dbh.inc.php';

$Firstname = $_POST['Firstname'];
$LastName = $_POST['Lastname'];
$Email = $_POST['Email'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];

$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$Firstname','$LastName','$Email','$uid','$pwd')";

mysqli_query($conn, $sql);
if ($pwd==$cpwd) {
  
  header("Location: ../register.php?signup=success");
}
