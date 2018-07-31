<?php
  include 'nav.php';
  include_once 'includes/dbh.inc.php';
?>
<head>
  <title>Edit Videos</title>
  <link rel="stylesheet" type="text/css" href="tryerror.css"> <!--pinalitan ko yung stylesheet-->
</head>
<body>
  <div class="edit">
    <?php
      $getVideosQuery = "SELECT VideoTitle, thumbnailPath, VideoAuthor, VideoDescription, IdNo FROM videostable";

      if($getVideos = mysqli_query($conn, $getVideosQuery)){



        while($getVideosRow = mysqli_fetch_row($getVideos)){
        $videoTitle = $getVideosRow[0];
        $videoThumbnail = $getVideosRow[1];
        $videoAuthor = $getVideosRow[2];
        $videoDescription = $getVideosRow[3];
        $videoID = $getVideosRow[4];

         echo "<div style='display: flex; flex-direction: row;'>";
        //check the on click event
        echo
           "
               <span style='height: 200px; width: 150px; margin-left: 30px;'>
                   <button type='button' id='$videoID' onclick='openModal(this.id); return false;'
                    style='background-image: url($videoThumbnail);
                   background-color:#fff;
                   border-color:transparent;
                   background-repeat: no-repeat;
                   background-position: center top;
                   height: inherit;
                   width: inherit;
                   flex: 1;
                   border-radius: 10px;
                   cursor:pointer;'>

                     <div style='padding-top: 100%;'>$videoTitle</div>

                   </button>

                   <form id='form.$videoID' action='editvideosfunction.php' method='POST' class='up' enctype='multipart/form-data'>
                       <div id='modal.$videoID' class='modal'>
                       <div class='modal-content'>

                       <div class='modal-header'>
                       <h2>$videoTitle</h2>
                       <span id='$videoID' class='close' onClick='exitModal(this.id);'>&times;</span>
                       </div>

                       <div class='modal-body'>
                       Title:
                       <input type='text' name='title' value='$videoTitle'><br><br>
                       Author: <input type='text' name='author'style='width:253px;' value='$videoAuthor'><br><br>
                       Description:<br><textarea name='desc'rows='8' cols='36'>$videoDescription</textarea>
                       </div>

                       <div class='modal-footer'>
                       <button id='$videoID' type='submit' name='submitBtn' value='$videoID' style='cursor:pointer;'>Submit</button>
                       </div>

                       </div>

                       </div>
                   </form>

                 </span>
             ";


        }


      }


        echo "</form>";

    ?>
  </div>

  <script>
  function openModal(e)
  {
        var container = 'modal.'.concat(e);
         document.getElementById(container).style.display="block";
  }
  function exitModal(e)
  {
      var container = 'modal.'.concat(e);
      document.getElementById(container).style.display="none";
  }
  </script>

</body>
</html>
