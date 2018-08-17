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
      //$getChapterQuery ="SELECT seriesID, chapterNo, chapterTitle, chapterPath FROM comicchaptertable";

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
            <div id='modal.<?php echo $comicsID; ?>' class='modal'>
                <!-- the modal itself -->
                <div>
                    <!-- this is the modal content/columns holder -->
                    <div class='modal-content'>
                        <!-- this is the modal header -->
                        <div class='modal-header'>
                            <h2><?php echo $comicsTitle; ?></h2>
                            <span id=<?php echo $comicsID; ?> class='close' onClick='exitModal(this.id);'>&times;</span>
                        </div>
                        <!-- modal body-->
                        <div class='modal-body'>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="seriesTab" data-toggle="tab" href="#series" role="tab" aria-controls="series" aria-selected="true">Series</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="uploadTab" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="false">Upload Chapter</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="editTab" style="display: none"data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit Chapter</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="series" role="tabpanel" aria-labelledby="seriesTab">
                                    <!-- first column of the modal + other attached columns -->
                                    <div class='first-column'>
                                      <form id='form.<?php echo $comicsID; ?>' action='editcomicsfunction.php' method='POST' class='up' enctype='multipart/form-data'>
                                        <br>Title: <input type='text' name='title' value=<?php echo $comicsTitle; ?>><br><br>
                                        Author: <input type='text' name='author'style='width:253px;' value=<?php echo $comicsAuthor; ?>><br><br>
                                        Description:<br><textarea name='desc'rows='8' cols='36'><?php echo $comicsDesc; ?></textarea>
                                      </form>
                                      <!-- second column of the modal   -->
                                      <div class='second-column'>
                                        <!-- row container of the second column of the modal -->
                                        <!--php
                                        $getChapterQuery = "SELECT * FROM trychaptertable WHERE seriesID = $comicsID";
                                        if($getChapter = mysqli_query($conn, $getChapterQuery)){
                                          while($getChapterRow = mysqli_fetch_row($getChapter)){
                                            $seriesNo = $getChapterRow[0];
                                            $chapterNo = $getChapterRow[1];
                                            $chapterTitle = $getChapterRow[2];
                                            $chapterPath = $getChapterRow[3];
                                            ?>

                                            <div class="table-row">
                                              <button type="button" id="chap" onclick = "return showChapter()">CHapter 1</button>
                                              button type="button" name="php echo $chapterNo; ?>">php echo "Chapter $chapterNo: $chapterTitle"?> </button>
                                              <button type="button" name="deleteBtn" id="delete" onclick="return validation()">X</button>
                                            </div>

                                          php };
                                        };
                                        ?> -->
                                        <div class="table-row">
                                              <button type="button" id="chap" >CHapter 1</button>
                                              <button type="button" name="deleteBtn" id="delete" onclick="return validation()">X</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="upload" role="tabpanel" aria-labelledby="uploadTab">
                                    <form id="formuploadcomics.<?php echo $comicsID; ?>" class="formuploadcomics" action="addnewchapter.php" method='POST' class='up' enctype='multipart/form-data'>
                                      <input type="file" name="chapterFile" form="formuploadcomics.<?php echo $comicsID; ?>">
                                      <input type="hidden" name="whatthe" value="<?php echo $comicsID ?>">
                                      Chapter No: <input type='text' name="chapterNo"><br><br>
                                      Title: <br><input type='text' name="chapterTitle">
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="editTab">
                                  Chapter No: <input type='text' name="chapterNo"><br><br>
                                  Title: <br><input type='text' name="chapterTitle">
                                </div>
                            </div>





                          </div>

                          <!-- this is the footer -->
                          <div class='modal-footer'>
                              <button type='submit' id=<?php echo $comicsID; ?> name='addChapter' form="formuploadcomics.<?php echo $comicsID; ?>">Upload</button>
                              <button class='save'id=<?php echo $comicsID; ?> type='submit' name='submitEdit' value=<?php echo $comicsID; ?> style="cursor:pointer;" form="form.<?php echo $comicsID; ?>">Submit</button>
                          </div>

                      </div>
                  </div>
                  <!-- ^where the modal itself ends -->

            </div>
            <!-- try adding a new form, will represent the 3rd column // iframe-->

          </span>

      <?php }
      // where the loop ends
      ?>
    <?php }
      // where the if statement ends
    ?>
  </div>

<!--End of description form-->


  <script type="text/javascript">
    $(document).ready(function(){
      $("#ucomics").addClass("active");
      //show EDIT TAB THEN HIDE THE UPLOAD TAB
      $("#chap").click(function(){
        //$("#editTab").show();
        $("#editTab").trigger("click");
        $("#editTab").show();
        $("#uploadTab").hide();
      })
      $("#seriesTab").click(function(){
        $("#editTab").hide();
        $("#uploadTab").show();
      });
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

  <!--script for deleting chapters-->
  <script>
  function validation(){
    var del = document.getElementById("delete").value; //change the "delete" to "chapterID"

    if(confirm('Are you sure you want to delete this chapter?')){
      //PHP COMMAND TO DELETE THE CHAPTER
    }else {
      return false;
    }
  }
  </script>


</body>
</html>
