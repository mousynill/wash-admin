<?php

  include_once 'includes/dbh.inc.php';

    if(isset($_POST['SubmitButton'])){ /*<--should be the name of the button*/

      $file = $_FILES['videoFile']; /*<-- should be the name of the input*/


      $fileTitle = $_POST['videoTitle'];
      $fileAuthor = $_POST['videoAuthor'];
      $fileDescription = $_POST['videoDescription'];
      $filePrice = $_POST['videoPrice'];

      $fileName = $_FILES['videoFile']['name'];
      $fileTmpName = $_FILES['videoFile']['tmp_name'];
      $fileSize = $_FILES['videoFile']['size'];
      $fileError = $_FILES['videoFile']['error'];
      $fileType = $_FILES['videoFile']['type'];


      $fileExt =  explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('mp4'); //don't forget to set this to mp4

      if (in_array($fileActualExt, $allowed)) {
          if ($fileError === 0) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;

            $fileDestination = 'uploads/videos/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);

            $sql = "INSERT INTO videostable(VideoFileName, VideoTitle, VideoAuthor, VideoDescription, VideoPath, VideoSize, VideoPrice) VALUES ('$fileName', '$fileTitle', '$fileAuthor', '$fileDescription', '$fileDestination', '$fileSize', $filePrice)";
            mysqli_query($conn, $sql);

          $query = "SELECT IdNo FROM videostable WHERE VideoPath = '$fileDestination'";
          $getIdNo = mysqli_query($conn, $query);
          $row = mysqli_fetch_row($getIdNo);
          $rowNum = $row[0];

          $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
          $imageFile = $rowNum.".jpg";
          $size = "150x120";
          $getSecond = 2;
          $cmd = "$ffmpeg -i $fileDestination -an -ss $getSecond -s $size thumbnails/$imageFile";
          (!shell_exec($cmd));

          $insertThumbnailQuery = "UPDATE videostable SET thumbnailPath='thumbnails/$imageFile' WHERE IdNo = '$rowNum'";
          mysqli_query($conn, $insertThumbnailQuery);

          header("Location: upload.php?uploadsuccess?");
          } else {
            echo "There was an error uploading your file.";
          }
      } else {
        echo "
        <script type='text/javascript'>
          var result = alert('The video you input must be an mp4 file!');
          if (result) {
            window.location.href = 'upload.php';
          } else {
            window.location.href ='upload.php';
          }

        </script>";

      }

    }
