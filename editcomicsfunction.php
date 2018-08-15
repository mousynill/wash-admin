<?php

  include_once 'includes/dbh.inc.php';
//  $getVideos = "SELECT VideoTitle, VideoAuthor, VideoDescription, Idno FROM videostable";

/*  if(isset($_GET['submitBtn'])){
    $id = $_GET['submitBtn'];
    $res = mysqli_query($conn, $getVideosQuery);
    $row = mysqli_fetch_array($res);
  }*/

  if(isset($_POST['submitEdit'])){

    $id =  $_POST['submitEdit'];
    $comicsTitle = $_POST['title'];
    $comicsAuthor =$_POST['author'];
    $comicsDesc = $_POST['desc'];

    $sql = "UPDATE comicstable SET ComicTitle = '$comicsTitle', ComicAuthor = '$comicsAuthor', ComicDescription = '$comicsDesc' WHERE SeriesID = '$id'";
    mysqli_query($conn, $sql);
  }


//  echo $videoTitle;
//  echo $videoAuthor;
//  echo $id;
  header("Location: editcomics.php?Edit=successful");





?>
