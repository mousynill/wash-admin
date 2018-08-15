<?php

  include_once 'includes/dbh.inc.php';


  if(isset($_POST['submitBtn'])){

    $id =  $_POST['submitBtn'];
    $videoTitle = $_POST['title'];
    $videoAuthor =$_POST['author'];
    $videoDesc = $_POST['desc'];

    $sql = "UPDATE videostable SET VideoTitle = '$videoTitle', VideoAuthor = '$videoAuthor', VideoDescription = '$videoDesc' WHERE IdNo = '$id'";
    mysqli_query($conn, $sql);
  }

  header("Location: editvideos.php?Edit=successful");

?>
