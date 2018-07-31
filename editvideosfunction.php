<?php

  include_once 'includes/dbh.inc.php';
//  $getVideos = "SELECT VideoTitle, VideoAuthor, VideoDescription, Idno FROM videostable";

/*  if(isset($_GET['submitBtn'])){
    $id = $_GET['submitBtn'];
    $res = mysqli_query($conn, $getVideosQuery);
    $row = mysqli_fetch_array($res);
  }*/

  if(isset($_POST['submitBtn'])){

    $id =  $_POST['submitBtn'];
    $videoTitle = $_POST['title'];
    $videoAuthor =$_POST['author'];
    $videoDesc = $_POST['desc'];

    $sql = "UPDATE videostable SET VideoTitle = '$videoTitle', VideoAuthor = '$videoAuthor', VideoDescription = '$videoDesc' WHERE IdNo = '$id'";
    mysqli_query($conn, $sql);
  }


//  echo $videoTitle;
//  echo $videoAuthor;
//  echo $id;
  header("Location: editvideos.php?Edit=successful");





?>
