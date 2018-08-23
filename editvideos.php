<?php
  include 'nav.php';
  include_once 'includes/dbh.inc.php';
?>
<head>
  <title>Edit Videos</title>
  <link rel="stylesheet" type="text/css" href="editvideos.css"> <!--pinalitan ko yung stylesheet-->
</head>
<body>
  <div class="edit">
    <?php
      $getVideosQuery = "SELECT VideoTitle, thumbnailPath, VideoAuthor, VideoDescription, IdNo, VideoPath FROM videostable";

      if($getVideos = mysqli_query($conn, $getVideosQuery)){

          while($getVideosRow = mysqli_fetch_row($getVideos)){
          $videoTitle = $getVideosRow[0];
          $videoThumbnail = $getVideosRow[1];
          $videoAuthor = $getVideosRow[2];
          $videoDescription = $getVideosRow[3];
          $videoID = $getVideosRow[4];
          $videoPath = $getVideosRow[5];
            ?>
      <div style="display: flex; flex-direction: row;">

               <span style='height: 200px; width: 150px; margin-left: 30px;'>
                   <button type='button' id=<?php echo $videoID ?> onclick='openModal(this.id); return false;'
                    style='background-image: url(<?php echo $videoThumbnail ?>);
                   background-color:#fff;
                   border-color:transparent;
                   background-repeat: no-repeat;
                   background-position: center top;
                   height: inherit;
                   width: inherit;
                   flex: 1;
                   border-radius: 10px;
                   cursor:pointer;'>

                     <div style='padding-top: 100%;'><?php echo $videoTitle ?></div>

                   </button>

                   <form id='form.<?php echo $videoID ?>' action='editvideosfunction.php' method='POST' class='up' enctype='multipart/form-data'>
                       <div id='modal.<?php echo $videoID ?>' class='modal'>
                       <div class='modal-content'>

                       <div class='modal-header'>
                       <h2><?php echo $videoTitle ?></h2>
                       <span id='<?php echo $videoID ?>' class='close' onClick='exitModal(this.id);'>&times;</span>
                       </div>

                       <div class='modal-body'>
                       <video height="250" width="537" controls>
                         <source src="<?php echo $videoPath; ?>" type="video/mp4">
                       </video><br>
                       <br>Title:
                       <input type='text' name='title' value='<?php echo $videoTitle ?>'><br><br>
                       Author: <input type='text' name='author'style='width:253px;' value='<?php echo $videoAuthor?>'><br><br>
                       Description:<br><textarea name='desc'rows='8' cols='50'><?php echo $videoDescription ?></textarea>
                       </div>

                       <div class='modal-footer'>
                       <button id='<?php echo $videoID ?>' type='submit' name='submitBtn' value='<?php echo $videoID ?>' style='cursor:pointer;'>Submit</button>
                       </div>

                       </div>

                       </div>
                   </form>

                 </span>

    <?php    }
    } ?>


        </form>

  </div>

<script type="text/javascript">
    $(document).ready(function(){
      $("#uvideos").addClass("active");
    })
</script>
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
