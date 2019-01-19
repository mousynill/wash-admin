<?php

$app->post('/uploadwithxlsx', function($request, $response){
  require_once('../src/config/db.php');

  $allowed = array("xlsx", "ods", "xml");
  $fixedForPrint = implode(', ', $allowed);
  $fixedForPrint = strtoupper($fixedForPrint);

  $toReturn = array(
    "success-resp" => 'We successfully received the file',
    "error-exist" => 'There was a problem uploading your file, maybe try again?',
    "error-na" => 'We do not support the filetype you just entered. We only accept '.$fixedForPrint.'.'
  );

   $file = $_FILES['formFile']; //<-- this should be the name of the input or form

   print_r($file);

     $fileName = $_FILES['formFile']['name'];
     $fileTmpName = $_FILES['formFile']['tmp_name'];
     $fileSize = $_FILES['formFile']['size'];
     $fileError = $_FILES['formFile']['error'];
     $fileType = $_FILES['formFile']['type'];

     $extension = pathinfo($fileType, PATHINFO_EXTENSION);

     if ($fileError === 0) {
       if(!in_array($extension, $allowed)){

       }else{
        echo $toReturn["error-na"];
       }
     }else{
      echo $toReturn["error-exist"];
     }

  }
)


?>
