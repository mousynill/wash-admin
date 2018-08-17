<?php

  include_once 'includes/dbh.inc.php';

    if(isset($_POST['addChapter'])){ /*<--should be the name of the button// references edit comics>add chapter button*/

      $seriesID = $_POST['whatthe'];
      echo $seriesID;
      $file = $_FILES['chapterFile']; /*<-- should be the name of the input// references edit comics>new chapter file*/
        print_r($file);
      $fileTitle = $_POST['chapterTitle'];
      $chapterNo = $_POST['chapterNo'];

      $fileName = $_FILES['chapterFile']['name'];
      $fileTmpName = $_FILES['chapterFile']['tmp_name'];
      $fileSize = $_FILES['chapterFile']['size'];
      $fileError = $_FILES['chapterFile']['error'];
      $fileType = $_FILES['chapterFile']['type'];

      $fileExt =  explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg');

      if (in_array($fileActualExt, $allowed)) {
          if ($fileError === 0) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;

            $fileDestination = 'uploads/comics/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $getChapNo = "SELECT count(*) FROM trychaptertable WHERE seriesID = $seriesID";
            $result = mysqli_query($conn, $getChapNo);

            if(mysqli_num_rows($result)>0){
                while($chapRow = mysqli_fetch_row($result)){
                      $currentChapNo = $chapRow[0];
                      $currentChapNo++;
                  }
              }

            $sql = "INSERT INTO trychaptertable VALUES ('$seriesID', '$currentChapNo', '$fileTitle', '$fileDestination')";
            mysqli_query($conn, $sql);

            header("Location: editcomics.php?addchaptersuccess");

          } else {
            echo "There was an error uploading your file.";
          }
      }
      else {
          echo "<script type='text/javascript'>
            var result = alert('The video you input must be a jpg file!');
            if (result) {
              window.location.href = 'editcomics.php';
            } else {
              window.location.href ='editcomics.php';
            }

          </script>";
      }

    }
