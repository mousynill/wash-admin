<?php

//MYSQL CONSTRAINT FORMATTING
// FK_theColumn_theReference
// ^type     ^column      ^table referencing to

// TO DO:
//   [x] Logic for inserting data into database
//   [x] Return objects upon successfull upload for USER review
//   [x] Queries for inserting each data into table
//
// LEGEND FOR TO DO:
//   [+] - Add
//   [x] - Modify
//   [✓] - Accomplished

$app->post('/uploadwithxlsx', function($request, $response){
    require_once('../src/config/db.php');
    require '../vendor/autoload.php';

    return "hello";

    $insertNewCategory = "INSERT INTO questioncategories(CategoryTitle) VALUES (:currentCategory)";
    $insertNewQuestion = "INSERT INTO surveyquestions(QuestionDesc, QuestionCategory) VALUES (:currentQuestion, :currentCategory)";
    $insertNewChoice = "INSERT INTO questionchoices(ChoiceDescription, QuestionID) VALUES (:currentChoice, :currentQuestion)";

    $allowed = array("xlsx", "ods", "xml");
      $fixedForPrint = implode(', ', $allowed);
      $fixedForPrint = strtoupper($fixedForPrint);

    $toReturn = array(
      "success-resp" => 'We successfully received the file',
      "error-exist" => 'There was a problem uploading your file, maybe try again?',
      "error-na" => 'We do not support the filetype you just entered. We only accept '.$fixedForPrint.'.'
    );

    $file = $_FILES['formFile']; //<-- this should be the name of the input or form
      $fileName = $_FILES['formFile']['name'];
      $fileTmpName = $_FILES['formFile']['tmp_name'];
      $fileSize = $_FILES['formFile']['size'];
      $fileError = $_FILES['formFile']['error'];
      $fileType = $_FILES['formFile']['type'];


    $fileExt =  explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    try {
      $db = new db();

      //connect
      $db = $db->connect();

      $insertNewCategory = $db->prepare($insertNewCategory);
      $insertNewQuestion = $db->prepare($insertNewQuestion);
      $insertNewChoice = $db->prepare($insertNewChoice);


      //how to execute
      // $statement->execute([
      //     'fname' => 'Bob',
      //     'sname' => 'Desaunois',
      //     'age' => '18',
      // ]);

      if ($fileError === 0) {
        if(in_array($fileActualExt, $allowed)){
         //this is where all the process is handled
         if($fileActualExt == "xlsx"){
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
          }else if($fileActualExt == "ods"){
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
          }else{
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
         }

          $reader->setReadDataOnly(true);
          $spreadsheet = $reader->load($_FILES['formFile']['tmp_name']);

          $sheetData = $spreadsheet->getActiveSheet()->toArray();

          foreach($sheetData as $key=>$rowVals){

            if($key != 0){
              foreach($rowVals as $key=>$rowCell){

                if($rowCell != "" && $key == 0){
                  $currentCategory = $rowCell;
                  $insertNewCategory->execute([
                    'currentCategory' => $currentCategory
                  ]);
                }
                else
                if($rowCell != "" && $key == 1){
                  $currentQuestion = $rowCell;
                  $insertNewQuestion->execute([
                    'currentQuestion' => $currentQuestion,
                    'currentCategory' => $currentCategory
                  ]);
                }
                else
                if($rowCell != "" && $key == 2){
                  $currentChoice = $rowCell;
                  $insertNewChoice->execute([
                    'currentChoice' => $currentChoice,
                    'currentQuestion' => $currentQuestion
                  ]);
                }

              }

            }//end of if

            echo "\n";
          }


        }else{
         echo $toReturn["error-na"];
        }
      }else{
       echo $toReturn["error-exist"];
      }
    } catch (PDOException $e) {
      return '{"error": {"text": '.$e->getMessage().'}';
    }




  }
)


?>
