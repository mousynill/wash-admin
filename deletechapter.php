<?php

  include_once 'includes/dbh.inc.php';

      $fromSeries = $_GET['thisSeriesID'];
      $deleteChapterNo = $_GET['thisChapNo'];

      $fileQuery = "SELECT chapterPath FROM trychaptertable WHERE seriesID = $fromSeries AND chapterNo = $deleteChapterNo";
      if($filePath = mysqli_query($conn, $fileQuery)){
        while($getFilePath = mysqli_fetch_row($filePath)){
        $delFile = $getFilePath[0];

          if(!unlink($delFile)){
            echo "There was an error deleting your file!";
          }else{
            unlink($delFile);
          }

        }
      }
      $deleteQuery = "DELETE FROM trychaptertable WHERE seriesID = $fromSeries AND chapterNo = $deleteChapterNo";
      mysqli_query($conn, $deleteQuery);
      header("Location: editcomics.php?deletechaptersuccess");



  function debug_to_console( $data )
  {
    $output = $data;
    if ( is_array( $output ) )
    $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
  }

?>
