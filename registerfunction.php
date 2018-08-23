<?php
  include_once 'includes/dbh.inc.php';

  if(isset($_POSt['submit'])){

    $firstName = $_POST['Firstname'];
    $lastName = $_POST['Lastname'];
    $eMail = $_POST['Email'];
    $userName = $_POST['uid'];
    $passWord = $_POST['pwd'];

    $regiQuery = "INSERT INTO users(user_id, user_last, user_email, user_uid, user_pwd) VALUES ('$firstName', '$lastName', '$eMail', '$userName', '$passWord')";
    mysqli_query($conn, $regiQuery);
  }
  header("Location: upload.php?registersuccess");


?>
