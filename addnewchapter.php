<?php

  include_once 'includes/dbh.inc.php';

    if(isset($_POST['submitButton'])){ /*<--should be the name of the button// references edit comics>add chapter button*/

      $file = $_FILES['chapterFile']; /*<-- should be the name of the input// references edit comics>new chapter file*/

      print_r($file);

      $fileTitle = $_POST['chapterTitle'];
      //$seriesID = $_POST['seriesID'];
      //$chapterNo = $_POST['chapterNo'];

      $fileName = $_FILES['comicsFile']['name'];
      $fileTmpName = $_FILES['comicsFile']['tmp_name'];
      $fileSize = $_FILES['comicsFile']['size'];
      $fileError = $_FILES['comicsFile']['error'];
      $fileType = $_FILES['comicsFile']['type'];

      $fileExt =  explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('pdf');

      if (in_array($fileActualExt, $allowed)) {
          if ($fileError === 0) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;

            $fileDestination = 'uploads/comics/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $sql = "INSERT INTO comicchaptertable VALUES (seriesID, chapterNo, chapterTitle, chapterPath) VALUES ('$seriesID', '$chapterNo', '$chapterTitle', '$chapterPath')";
            mysqli_query($conn, $sql);

            header("Location: uploadcomics.php?uploadchaptersuccess");

          } else {
            echo "There was an error uploading your file.";
          }
      } else {
          echo "<script type='text/javascript'>
            var result = alert('The video you input must be a jpg file!');
            if (result) {
              window.location.href = 'uploadcomics.php';
            } else {
              window.location.href ='uploadcomics.php';
            }

          </script>";
      }

    }
