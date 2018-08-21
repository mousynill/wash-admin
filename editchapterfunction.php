<?php

  include_once 'includes/dbh.inc.php';

  if(isset($_POST['editChap'])){

    $chapNo = $_POST['editChap'];
    $chapTitle = $_POST['chapterTitle'];

    $sql = "UPDATE trychaptertable SET chapterTitle = '$chapTitle' WHERE chapterNo = '$chapNo'";
    mysqli_query($conn, $sql);
    
    echo "$chapNo";
    echo "$chapTitle";
    echo "ewan ko ba";
  }
  else{echo "wala";}
  //header("Location: editcomics.php?EditChapter=successful!");
?>
