<?php

  include_once 'includes/dbh.inc.php';

    if(isset($_POST['submitButton'])){ /*<--should be the name of the button*/

      $file = $_FILES['comicsFile']; /*<-- should be the name of the input*/

      print_r($file);

      $fileTitle = $_POST['comicsTitle'];
      $fileAuthor = $_POST['comicsAuthor'];
      $fileDescription = $_POST['comicsDescription'];

      $fileName = $_FILES['comicsFile']['name'];
      $fileTmpName = $_FILES['comicsFile']['tmp_name'];
      $fileSize = $_FILES['comicsFile']['size'];
      $fileError = $_FILES['comicsFile']['error'];
      $fileType = $_FILES['comicsFile']['type'];

      $fileExt =  explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg','jpeg','png','pdf');

      if (in_array($fileActualExt, $allowed)) {
          if ($fileError === 0) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;

            $fileDestination = 'uploads/comics/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);

            //don't forget to swap the CONSTANT with VARIABLES(`Montsters INC` swap $fileTitle, `Pixars` swap $fileAuthor, `A film by...` swap $fileDescription)//
            $sql = "INSERT INTO comicstable(ComicFileName, ComicTitle, ComicAuthor, ComicDescription, ComicPath, ComicSize) VALUES ('$fileName', '$fileTitle', '$fileAuthor', '$fileDescription', '$fileDestination', '$fileSize')";
            mysqli_query($conn, $sql);

            header("Location: uploadcomics.php?uploadsuccess");

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
