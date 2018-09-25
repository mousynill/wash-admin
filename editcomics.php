<?php
  include 'nav.php';
  include_once 'includes/dbh.inc.php';
?>
<head>
  <title>Edit Comics</title>
  <link rel="stylesheet" type="text/css" href="editcomics.css"> <!--pinalitan ko yung stylesheet-->
</head>

<body>
  <div id="wee"class="edit">
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

              <div style='padding-top: 100%;'><span style="background-color:white;"><?php echo $comicsTitle; ?></span></div>

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
                                  <a class="nav-link active" id="<?php echo $comicsID; ?>" data-toggle="tab" href="#seriesTabFor<?php echo $comicsID; ?>" role="tab" aria-controls="series" aria-selected="true" onclick="series(this.id)" >Series</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="uploadTab<?php echo $comicsID; ?>" value="<?php echo $comicsID;?>" data-toggle="tab" href="#uploadForSeries<?php echo $comicsID; ?>" role="tab" aria-controls="upload" aria-selected="false">Upload Chapter</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="editTab<?php echo $comicsID; ?>" style="display: none" value="<?php echo $comicsID;?>" data-toggle="tab" href="#editFor<?php echo $comicsID; ?>" role="tab" aria-controls="edit" aria-selected="false">Edit Chapter</a>
                                </li>
                            </ul>


                            <!-- SERIES TAB -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="seriesTabFor<?php echo $comicsID; ?>" role="tabpanel" aria-labelledby="seriesTab">
                                    <!-- first column of the modal + other attached columns -->
                                    <div class='first-column'>
                                      <form id='form.<?php echo $comicsID; ?>' action='editcomicsfunction.php' method='POST' class='up' enctype='multipart/form-data'>
                                        <br>Title: <input type='text' name='title' value="<?php echo $comicsTitle; ?>"><br><br></input>

                                        Author: <input type='text' name='author'style='width:253px;' value="<?php echo $comicsAuthor; ?>"><br><br></input>
                                        Description:<br><textarea name='desc'rows='8' cols='40'><?php echo $comicsDesc; ?></textarea>
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
                                              <button class="myrowbutton" type="button" value="<?php echo $comicsID; ?>" id="<?php echo $comicsID.$chapterNo; ?>"  name="<?php echo $chapterNo; ?>" onclick="edit(this.value,this.id)" ><?php echo "Chapter $chapterNo: $chapterTitle"?>
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
                                <?php
                                $getChapNo = "SELECT chapterNo,chapterTitle FROM trychaptertable WHERE seriesID = $comicsID";
                                $result = mysqli_query($conn, $getChapNo);

                                if(mysqli_num_rows($result)>0){
                                  while($chapRow = mysqli_fetch_row($result)){
                                    $currentChapNo = $chapRow[0];
                                    $chapTitle = $chapRow[1];
                                    ?>
                                <div class="tab-pane fade" id="editFor<?php echo $comicsID; ?>" role="tabpanel" aria-labelledby="editTab">
                                    <form action="editchapterfunction.php" method="POST" id="formeditchapter.<?php echo $currentChapNo;?>">
                                      Chapter No: <a name="chapterNo" value="<?php echo $currentChapNo; ?>" ><?php echo $currentChapNo; ?></a><br><br>
                                      Title: <br><input type='text' id="<?php $currentChapNo ?>" name="chapterTitle" value ="<?php echo $chapTitle ?>">
                                    </form>
                                  </div>
                                <?php }
                              }
                              ?>
                            </div>

                          </div>

                          <!-- this is the footer -->
                          <div class='modal-footer'>
                              <button class='save'id="btnSubmit<?php echo $comicsID; ?>" type='submit' name='submitEdit' value=<?php echo $comicsID; ?> style="cursor:pointer;" form="form.<?php echo $comicsID; ?>">Submit</button>
                              <button type='submit' id="btnUpload<?php echo $comicsID; ?>" name='addChapter' form="formuploadcomics.<?php echo $comicsID; ?>" style="cursor:pointer;">Upload</button>
                              <button type="submit" id="btnUpdate<?php echo $currentChapNo; ?>" name="editChap" form="formeditchapter.<?php echo $currentChapNo; ?>" value="<?php echo$currentChapNo; ?>" style="cursor:pointer;">Update</button>
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

<!--  <iframe id="myIframe"  name="myIframe" src="text.php"></iframe>-->
</div>
<!--End of description form-->


<script type="text/javascript">
  $(document).ready(function(){
    $("#ucomics").addClass("active");

    //show EDIT TAB THEN HIDE THE UPLOAD TAB
/*   $("#chap").click(function(){
      $("#editTab").trigger("click");
      $("#editTab").show();
      $("#uploadTab").hide();
    })
    //SHOW UPLAD WHEN SERIES IS CLICKED
    $("#seriesTab").click(function(){
      $("#editTab").hide();
      $("#uploadTab").show();
    });*/
  })

</script>
<script>


//var iframecontent = $('#myIframe').contents();
//var content = $("#wee myIframe").contents().find(".what").html();
//alert(content);
//console.log(content);




function edit(series, chapNo){
  //var result { };
  var thisSeriesID = series;
  var thisChapNo = chapNo;
  //var joined = thisSeriesID.concat(thisChapNo);

      //show EDIT TAB THEN HIDE THE UPLOAD TAB
      $("#editTab".concat(thisSeriesID)).trigger("click");
      $("#editTab".concat(thisSeriesID)).show();
    //  document.getElementById("#btnUpdate".concat(thisChapNo)).style.display = "block";
      $("#uploadTab".concat(thisSeriesID)).hide();
    //  document.getElementById("#btnSubmit".concat(thisSeriesID)).style.display = "none";
    //  document.getElementById("#btnUpload").concat(thisSeriesID).style.display = "none";

      //$.each($('formeditchapter'.concat(thisChapNo).serializeArray(), function(){
      //    result[this.]
      //}))

  console.log(thisSeriesID);

}
function series(series){
  var thisSeriesID = series;

    //SHOW UPLAD WHEN SERIES IS CLICKED
    $("#editTab".concat(thisSeriesID)).hide();
    //$("#btnUpdate".concat(thisChapNo)).style.display = "none";
    //$("#btnUpload").style.display = "none";
    $("#uploadTab".concat(thisSeriesID)).show();
  //  document.getElementById("#btnSubmit".concat(thisSeriesID)).style.display = "block";
    console.log(thisSeriesID);


}



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


  <!--script for deleting chapters-->
  <script>
  function validation(series,chapNo){

    var thisSeriesID = series;
    var thisChapNo = chapNo;

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = "deletechapter.php?thisSeriesID=" +thisSeriesID+"&thisChapNo="+thisChapNo;
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Your file is safe!");
      }
    })
  }



  </script>


</body>
</html>
