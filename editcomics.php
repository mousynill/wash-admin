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

        echo "<div style='display: flex; flex-direction: row;'>";
       //check the on click event
       echo
          "
              <span style='height: 200px; width: 150px; margin-left: 30px;'>
                  <button type='button' id='$comicsID' onclick='openModal(this.id); return false;'
                   style='background-image: url($comicsThumbnail);
                  background-color:#fff;
                  border-color:transparent;
                  background-repeat: no-repeat;
                  background-position: center top;
                  height: inherit;
                  width: inherit;
                  flex: 1;
                  border-radius: 10px;
                  cursor:pointer;'>

                    <div style='padding-top: 100%;'>$comicsTitle</div>

                  </button>

                  <form id='form.$comicsID' action='editcomicsfunction.php' method='POST' class='up' enctype='multipart/form-data'>
                      <div id='modal.$comicsID' class='modal'>
                      <div class='modal-content'>

                      <div class='modal-header'>
                      <h2>$comicsTitle</h2>
                      <span id='$comicsID' class='close' onClick='exitModal(this.id);'>&times;</span>
                      </div>

                      <div class='modal-body'>
                        <div class='first-column'>
                          Title:
                          <input type='text' name='title' value='$comicsTitle'><br><br>
                          Author: <input type='text' name='author'style='width:253px;' value='$comicsAuthor'><br><br>
                          Description:<br><textarea name='desc'rows='8' cols='36'>$comicsDesc</textarea>
                        <div class='second-column'>
                          <div class='table-row'>
                          Chapter 1sssssssssssssssssss
                          <div class='table-row'>
                            chapter2
                            </div>

                          </div>

                        </div>
                        <div class='second-column'>
                          Title:
                          <input type='text' name='cTitle'><br><br>
                        </div>

                        </div>

                      </div>

                      <div class='modal-footer'>
                        <button class='save'id='$comicsID' type='submit' name='submitBtn' value='$comicsID' style='cursor:pointer;'>Submit</button>
                      </div>

                      </div>

                      </div>
                  </form>

                </span>
            ";

       }

     }

       echo "</form>";
      //<button class='save' type='submit' name='submit' value='$comicsID' style='cursor:pointer;';>Save</button>
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
