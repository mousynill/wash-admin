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
                                  <a class="nav-link active" id="seriesTab" data-toggle="tab" href="#seriesTabFor<?php echo $comicsID; ?>" role="tab" aria-controls="series" aria-selected="true">Series</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="uploadTab" data-toggle="tab" href="#uploadForSeries<?php echo $comicsID; ?>" role="tab" aria-controls="upload" aria-selected="false">Upload Chapter</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="editTab"  style="display:none;"data-toggle="tab" href="#editFor<?php echo $comicsID; ?>" role="tab" aria-controls="edit" aria-selected="false">Edit Chapter</a>
                                </li>
                            </ul>

                            <!-- SERIES TAB -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="seriesTabFor<?php echo $comicsID; ?>" role="tabpanel" aria-labelledby="seriesTab">
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
                                      <?php
                                        $getChapterQuery = "SELECT * FROM trychaptertable WHERE seriesID = $comicsID";
                                        if($getChapter = mysqli_query($conn, $getChapterQuery)){
                                          while($getChapterRow = mysqli_fetch_row($getChapter)){
                                            $seriesNo = $getChapterRow[0];
                                            $chapterNo = $getChapterRow[1];
                                            $chapterTitle = $getChapterRow[2];
                                            $chapterPath = $getChapterRow[3];
                                      ?>

                                            <div class="table-row">
                                              <button class="myrowbutton" type="button" id="chap" value="<?php echo $comicsID; ?>" name="<?php echo $chapterNo; ?>"><?php echo "Chapter $chapterNo: $chapterTitle"?>
                                              </button>
                                              <button type="button" name="deleteBtn" value="<?php echo $comicsID; ?>" id="<?php echo $chapterNo; ?>" onclick="validation(this.value,this.id)">X</button>
                                            </div>

                                          <?php };
                                        };
                                        ?>

                                      </div>
                                    </div>
                                </div>

                                <!-- UPLOAD TAB -->
                                <div class="tab-pane fade" id="uploadForSeries<?php echo $comicsID; ?>" role="tabpanel" aria-labelledby="uploadTab">
                                    <form id="formuploadcomics.<?php echo $comicsID; ?>" class="formuploadcomics" action="addnewchapter.php" method='POST' class='up' enctype='multipart/form-data'>
                                      <input type="file" name="chapterFile" form="formuploadcomics.<?php echo $comicsID; ?>">
                                      <input type="hidden" name="whatthe" value="<?php echo $comicsID ?>">
                                          <?php
                                            $getChapNo = "SELECT count(*) FROM trychaptertable WHERE seriesID = $comicsID";
                                            $result = mysqli_query($conn, $getChapNo);

                                            if(mysqli_num_rows($result)>0){
                                                while($chapRow = mysqli_fetch_row($result)){
                                                      $currentChapNo = $chapRow[0];

                                          ?>
                                                      Chapter No: <input type='text' name="chapterNoFor" value="<?php echo $currentChapNo+1; ?>"><br><br>
                                            <?php }
                                            mysqli_free_result($result);
                                            }
                                          ?>
                                      Title: <br><input type='text' name="chapterTitle">
                                    </form>
                                </div>

                                <!-- EDIT TAB -->
                                <div class="tab-pane fade" id="editFor<?php echo $comicsID; ?>" role="tabpanel" aria-labelledby="editTab">
                                  <?php
                                    $getChapNo = "SELECT count(*),chapterTitle FROM trychaptertable WHERE seriesID = $comicsID";
                                    $result = mysqli_query($conn, $getChapNo);

                                    if(mysqli_num_rows($result)>0){
                                        while($chapRow = mysqli_fetch_row($result)){
                                              $currentChapNo = $chapRow[0];
                                              $chapTitle = $chapRow[1];
                                  ?>
                                  Chapter No: <input type='text' name="chapterNo" value="<?php echo $currentChapNo; ?>" ><br><br>
                                  Title: <br><input type='text' name="chapterTitle" value ="<?php echo $chapTitle ?>">
                                <?php }
                              }
                              ?>
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
      mysqli_close($conn);
    ?>
  </div>

<!--End of description form-->


<script type="text/javascript">
  $(document).ready(function(){
    $("#ucomics").addClass("active");

    //show EDIT TAB THEN HIDE THE UPLOAD TAB
    $("#chap").click(function(){
      $("#editTab").trigger("click");
      $("#editTab").show();
      $("#uploadTab").hide();
    })
    //SHOW UPLAD WHEN SERIES IS CLICKED
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

  <style>
      .myrowbutton{
          border-radius: 2px;
          cursor: pointer;
          line-height: 1.8;
          color: black;
          padding: 12px;
          margin-bottom: 12px;
          border: solid 1px #000;
          transition: 0.05s;
          font-size: 68%;
          align-items: center;
          justify-content: center;
          text-align: center;
      }
      a, a:hover {
        text-decoration: none;
      }
  </style>

  <!--script for deleting chapters-->
  <script>
  function validation(series,chapNo){

    var thisSeriesID = series;
    var thisChapNo = chapNo;

    if(confirm('Are you sure you want to delete this chapter?')){
      //PHP COMMAND TO DELETE THE CHAPTER


          window.location.href = "deletechapter.php?thisSeriesID=" +thisSeriesID+"&thisChapNo="+thisChapNo;


    }else {
      return false;
    }
  }



  </script>


</body>
</html>
