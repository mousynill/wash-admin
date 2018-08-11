  <?php
  include 'nav.php';
  include_once 'includes/dbh.inc.php';
?>
<head>
  <title>Edit Comics</title>
  <link rel="stylesheet" type="text/css" href="editcomics.css"> <!--pinalitan ko yung stylesheet-->
</head>
<body>
  <div class="edit">
    <?php
      $getComicsQuery = "SELECT ComicTitle, ComicThumbnailPath, ComicAuthor, ComicDescription, SeriesID FROM comicstable";

      if($getComics = mysqli_query($conn, $getComicsQuery)){

        while($getComicsRow = mysqli_fetch_row($getComics)){
        $comicsTitle = $getComicsRow[0];
        $comicsThumbnail = $getComicsRow[1];
        $comicsAuthor = $getComicsRow[2];
        $comicsDesc = $getComicsRow[3];
        $comicsID = $getComicsRow[4];
        ?>

      <!-- RNILL, try mo hanapin nasan yung closing tag neto -->
      <div style="display: flex; flex-direction: row;">

              <span style='height: 200px; width: 150px; margin-left: 30px;'>

                  <!-- button that opens the modal/with thumbnail partnered with its unique modal -->
                  <button type='button' id=<?php echo $comicsID; ?> onclick='openModal(this.id); return false;'
                  style='background-image: url(<?php echo $comicsThumbnail; ?>);
                  background-color:#fff;
                  border-color:transparent;
                  background-repeat: no-repeat;
                  background-position: center top;
                  height: inherit;
                  width: inherit;
                  flex: 1;
                  border-radius: 10px;
                  cursor:pointer;'>

                      <div style='padding-top: 100%;'><?php echo $comicsTitle; ?></div>

                  </button>

                  <!-- the form for submission of the changes in the modal -->
                  <form id='form.<?php echo $comicsID; ?>' action='editcomicsfunction.php' method='POST' class='up' enctype='multipart/form-data'>

                      <!-- the modal itself -->
                      <div id='modal.<?php echo $comicsID; ?>' class='modal'>

                          <!-- this is the modal content/columns holder -->
                          <div class='modal-content'>

                                <!-- this is the modal header -->
                                <div class='modal-header'>
                                  <h2><?php echo $comicsTitle; ?></h2>
                                  <span id=<?php echo $comicsID; ?> class='close' onClick='exitModal(this.id);'>&times;</span>
                                </div>

                                  <!-- this is the modal body-->
                                  <div class='modal-body'>

                                      <!-- this is the first column of the modal + other attached columns -->
                                      <div class='first-column'>
                                        Title:
                                        <input type='text' name='title' value=<?php echo $comicsTitle; ?>><br><br>
                                        Author: <input type='text' name='author'style='width:253px;' value=<?php echo $comicsAuthor; ?>><br><br>
                                        Description:<br><textarea name='desc'rows='8' cols='36'><?php echo $comicsDesc; ?></textarea>

                                        <!-- this is the second column of the modal   -->
                                        <div class='second-column'>
                                          <!-- this is the row container of the second column of the modal -->
                                          <div class='table-row'>
                                          Chapter 1sssssssssssssssssss
                                            <!-- this is the actual rows of the second column AKA chapters -->
                                            <div class='table-row'>
                                            chapter2
                                            </div>
                                          </div>
                                          <br><br><input type="file" name="chap"></input>
                                        </div>

                                          <!-- this is the third column  of the modal-->
                                          <div class='second-column'>
                                            Title:
                                            <input type='text' name='cTitle'><br><br>
                                            Description:<br><textarea name='desc'rows='8' cols='26'><?php echo $comicsDesc; ?></textarea>


                                          </div>

                                      </div>

                                  </div>

                                  <!-- this is the footer -->
                                  <div class='modal-footer'>
                                    <button type='submit'>Upload</button>
                                    <button class='save'id=<?php echo $comicsID; ?> type='submit' name='submitBtn' value=<?php echo $comicsID; ?> style='cursor:pointer;'>Submit</button>
                                  </div>

                          </div>

                      </div>
                    <!-- ^where the modal itself ends -->

                  </form>

                </span>

      <?php }
      // where the loop ends
      ?>
    <?php }
      // where the if statement ends
    ?>


  <!--End of description form-->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#ucomics").addClass("active");
    })
  </script>

  <script>
  function openModal(e)
  {
        var container = 'modal.'.concat(e);
        document.getElementById(container).style.display="block";
        if(e.keyCode == 27){
          document.getElementById(container).style.display="block";
        }
  }
  function exitModal(e)
  {
      var container = 'modal.'.concat(e);
      document.getElementById(container).style.display="none";

  }

  </script>

</body>
</html>
