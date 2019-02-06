<?php

//how to get current increment value for a table
//SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'wash' AND TABLE_NAME = 'questioncategories';

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

    $stringToReturn = "";

    $insertNewCategory = "INSERT INTO questioncategories(CategoryTitle) VALUES (:currentCategory)";
      $insertNewQuestion = "INSERT INTO surveyquestions(QuestionDesc, QuestionCategory) VALUES (:currentQuestion, :currentCategory)";
      $insertNewChoice = "INSERT INTO questionchoices(ChoiceDescription, QuestionID) VALUES (:currentChoice, :currentQuestion)";

    $getCategoryIncrement = "SELECT `AUTO_INCREMENT` AS `CategoryIndex` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'wash' AND TABLE_NAME = 'questioncategories'";
      $getQuestionIncrement = "SELECT `AUTO_INCREMENT` AS `QuestionIndex` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'wash' AND TABLE_NAME = 'surveyquestions'";
      $getChoiceIncrement = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'wash' AND TABLE_NAME = 'questionchoices'";

    $allowed = array("xlsx", "ods", "xml");
      $fixedForPrint = implode(', ', $allowed);
      $fixedForPrint = strtoupper($fixedForPrint);

    $toReturn = array(
      "success-resp" => 'We successfully received the file',
      "error-exist" => 'There was a problem uploading your file, maybe try again?',
      "error-na" => 'We do not support the filetype you just entered. We only accept '.$fixedForPrint.'.'
    );

    $file = $_FILES['inputFile']; //<-- this should be the name of the input or form
      $fileName = $_FILES['inputFile']['name'];
      $fileTmpName = $_FILES['inputFile']['tmp_name'];
      $fileSize = $_FILES['inputFile']['size'];
      $fileError = $_FILES['inputFile']['error'];
      $fileType = $_FILES['inputFile']['type'];

    $fileExt =  explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

    try {
      $db = new db();

      //connect
      $db = $db->connect();

      $insertNewCategory = $db->prepare($insertNewCategory);
        $insertNewQuestion = $db->prepare($insertNewQuestion);
        $insertNewChoice = $db->prepare($insertNewChoice);

      $getCategoryIncrement = $db->query($getCategoryIncrement);
        $getQuestionIncrement = $db->query($getQuestionIncrement);
        $getChoiceIncrement = $db->query($getChoiceIncrement);


      $categoryIndex = 0;
      $questionIndex = 0;


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
          $spreadsheet = $reader->load($_FILES['inputFile']['tmp_name']);

          $sheetData = $spreadsheet->getActiveSheet()->toArray();

          foreach($sheetData as $key=>$rowVals){

            $getCategoryIncrement->execute();
            $getQuestionIncrement->execute();


            if($key != 0){
              foreach($rowVals as $key=>$rowCell){

                if($rowCell != "" && $key == 0){

                  $stringToReturn .= "<div class='card'>";

                  $currentCategory = $rowCell; //the value of the the current category

                  $categoryObject = $getCategoryIncrement->fetch(PDO::FETCH_OBJ); // get the next index

                  $categoryIndex = $categoryObject->CategoryIndex;

                  $stringToReturn .= "
                  <div class='card-header' id='heading'>
                    <h5 class='mb-0'>
                      <button class='btn btn-link' data-toggle='collapse' data-target='$currentCategory' aria-expanded='true' aria-controls='$currentCategory' type='button'>
                        $currentCategory
                      </button>
                    </h5>
                  </div>
                  ";

                  // $insertNewCategory->execute([
                  //   'currentCategory' => $currentCategory
                  // ]);


                }
                else
                if($rowCell != NULL && $key == 1){

                  $currentQuestion = $rowCell;

                  $questionObject = $getQuestionIncrement->fetch(PDO::FETCH_OBJ);

                  $questionIndex = $questionObject->QuestionIndex;

                  // $insertNewQuestion->execute([
                  //   'currentQuestion' => $currentQuestion,
                  //   'currentCategory' => $categoryIndex
                  // ]);

                }
                else
                if($rowCell != NULL && $key == 2){

                  $currentChoice = $rowCell;


                  // $insertNewChoice->execute([
                  //   'currentChoice' => $currentChoice,
                  //   'currentQuestion' => $questionIndex
                  // ]);
                }

                $stringToReturn .= "</div>";

              }

            }//end of if

            echo "\n";
          }

          return $stringToReturn;

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
