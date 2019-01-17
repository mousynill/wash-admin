<?php

include_once 'includes/dbh.inc.php';

  $toReturn = array(
    "resp" => 'We received it',
    "error" => 'We did not receive your'
  );

  if($_POST["formFile"]){
    return json_encode($toReturn[0]);
  }else {
    return json_encode($toReturn[1]);
  }

  // $allowed = array("xlsx", "ods", "xml");
  // $fixedForPrint = implode(', ', $allowed);
  // $fixedForPrint = strtoupper($fixedForPrint);

  // if(isset($_POST['mainButton'])){
  //
  //   $file = $_FILES['xlsx-file']; //<-- this should be the name of the input
  //
  //   $fileName = $_FILES['xlsx-file']['name'];
  //   $fileTmpName = $_FILES['xlsx-file']['tmp_name'];
  //   $fileSize = $_FILES['xlsx-file']['size'];
  //   $fileError = $_FILES['xlsx-file']['error'];
  //   $fileType = $_FILES['xlsx-file']['type'];
  //
  //   $extension = pathinfo($fileType, PATHINFO_EXTENSION);
  //
  //   if ($fileError === 0) {
  //     if(!in_array($extension, $allowed)){
  //
  //     }else{
  //       echo "
  //           alert('We do not support the filetype you just entered. We only accept ".$fixedForPrint.".');";
  //     }
  //   }else{
  //     echo "alert('We do not support the filetype you just entered. We only accept ".$fixedForPrint.".');";
  //   }
  //
  // }

?>
