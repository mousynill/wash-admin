<?php

include_once 'includes/dbh.inc.php';

  $allowed = array("xlsx", "ods", "xml");
  $fixedForPrint = implode(', ', $allowed);
  $fixedForPrint = strtoupper($fixedForPrint);

  if(isset($_POST['mainButton'])){

    $file = $_FILES['xlsx-file']; //<-- this should be the name of the input

    $fileName = $_FILES['xlsx-file']['name'];
    $fileTmpName = $_FILES['xlsx-file']['tmp_name'];
    $fileSize = $_FILES['xlsx-file']['size'];
    $fileError = $_FILES['xlsx-file']['error'];
    $fileType = $_FILES['xlsx-file']['type'];

    $extension = pathinfo($fileType, PATHINFO_EXTENSION);

    if(!in_array($extension, $allowed)){

    }else{
      echo "
      <script type='text/javascript'>
          alert('We doe not support the filetype you just entered. We only accept ".$fixedForPrint.".');
      </script>";
    }


  }
