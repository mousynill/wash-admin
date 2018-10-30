<?php

  include_once 'includes/dbh.inc.php';

    //if(isset($_POST['SubmitButton'])){ /*<--should be the name of the button*/

      //$file = $_FILES['videoFile']; /*<-- should be the name of the input*/


      $fileTitle = $_POST['videoTitle'];
      $fileAuthor = $_POST['videoAuthor'];
      $fileDescription = $_POST['videoDescription'];
      $filePrice = $_POST['videoPrice'];

      // $fileName = $_FILES['videoFile']['name'];
      // $fileTmpName = $_FILES['videoFile']['tmp_name'];
      // $fileSize = $_FILES['videoFile']['size'];
      // $fileError = $_FILES['videoFile']['error'];
      // $fileType = $_FILES['videoFile']['type'];

      $question1 = $_POST['question1'];
      $ans1A = $_POST['ans1A'];
      $ans1B = $_POST['ans1B'];
      $ans1C = $_POST['ans1C'];
      $question2 = $_POST['question2'];
      $ans2A = $_POST['ans2A'];
      $ans2B = $_POST['ans2B'];
      $ans2C = $_POST['ans2C'];
      $question3 = $_POST['question3'];
      $ans3A = $_POST['ans3A'];
      $ans3B = $_POST['ans3B'];
      $ans3C = $_POST['ans3C'];
      $question4 = $_POST['question4'];
      $ans4A = $_POST['ans4A'];
      $ans4B = $_POST['ans4B'];
      $ans4C = $_POST['ans4C'];
      $question5 = $_POST['question5'];
      $ans5A = $_POST['ans5A'];
      $ans5B = $_POST['ans5B'];
      $ans5C = $_POST['ans5C'];

      // $fileExt =  explode('.', $fileName);
      // $fileActualExt = strtolower(end($fileExt));
      //
      // $allowed = array('mp4'); //don't forget to set this to mp4

      for ($i=1; $i < 6; $i++) {
        // code...
        $question = $_POST['question'.$i];
        $choice1 = $_POST['ans'.$i.'A'];
        $choice2 = $_POST['ans'.$i.'B'];
        $choice3 = $_POST['ans'.$i.'C'];
        $answer = $_POST['optradio'.$i];


        $insertquery = "INSERT INTO videoquestions(questionContent, choiceOne, choiceTwo, choiceThree, correctAnswer, videoID) VALUES ('$question', '$choice1','$choice2','$choice3','A', 5)";
        $resulta = mysqli_query($conn, $insertquery);


        if (!$resulta) {
          die('invalid query: '. mysqli_error($conn));
        }
      }

      // if (in_array($fileActualExt, $allowed)) {
      //     if ($fileError === 0) {
      //       $fileNameNew = uniqid('', true).".".$fileActualExt;
      //
      //       $fileDestination = 'uploads/videos/'.$fileNameNew;
      //       move_uploaded_file($fileTmpName,$fileDestination);
      //
      //       $sql = "INSERT INTO videostable(VideoFileName, VideoTitle, VideoAuthor, VideoDescription, VideoPath, VideoSize, VideoPrice) VALUES ('$fileName', '$fileTitle', '$fileAuthor', '$fileDescription', '$fileDestination', '$fileSize', $filePrice)";
      //       mysqli_query($conn, $sql);
      //
      //
      //     $query = "SELECT IdNo FROM videostable WHERE VideoPath = '$fileDestination'";
      //     $getIdNo = mysqli_query($conn, $query);
      //     $row = mysqli_fetch_row($getIdNo);
      //     $rowNum = $row[0];
      //
      //     $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
      //     $imageFile = $rowNum.".jpg";
      //     $size = "150x120";
      //     $getSecond = 2;
      //     $cmd = "$ffmpeg -i $fileDestination -an -ss $getSecond -s $size thumbnails/$imageFile";
      //     (!shell_exec($cmd));
      //
      //     $insertThumbnailQuery = "UPDATE videostable SET thumbnailPath='thumbnails/$imageFile' WHERE IdNo = '$rowNum'";
      //     mysqli_query($conn, $insertThumbnailQuery);
      //
      //
      //
      //     //header("Location: upload.php?uploadsuccess?");
      //     } else {
      //       echo "There was an error uploading your file.";
      //     }
      // } else {
      //   echo "
      //   <script type='text/javascript'>
      //     var result = alert('$file');
      //     // if (result) {
      //     //   window.location.href = 'upload.php';
      //     // } else {
      //     //   window.location.href ='upload.php';
      //     // }
      //
      //   </script>";
      //
      // }
