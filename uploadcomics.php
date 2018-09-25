<?php
  include 'nav.php';
?>

<head>
  <link rel="stylesheet" type="text/css" href="uploadcomics.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
</head>

<body>

  <!--Upload Form -->
  <form name ="myComic"action="uploadcomicsfunction.php" method="POST" class="up" enctype="multipart/form-data" onsubmit="return validateForm()" >

      <div class="input-file">
      <input type="file" name="comicsFile">
      <img src="images/upload.png" height="100"width="125" alt="upload logo"></img>
        <p>Upload the cover photo of the series here.</p>
      </input>
      <button type="submit" name="submitButton">Upload</button>
      </div>

      <div class="author">
        Title: <input type="text" name="comicsTitle"placeholder="Enter title here">
        <br><br><br>Author: <input type="text" name="comicsAuthor" placeholder="Enter author here">
      </div>

      <div class="desc">
          Description:<br><textarea name="comicsDescription"rows="8" cols="36" placeholder="Enter the description here"></textarea>
      </div>

  </form>
  <!--End of description form-->
  <!--for active link -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#ucomics").addClass("active");
    })
  </script>

  <!--script for validation -->
    <script>
      function validateForm() {
        var comic = document.forms["myComic"]["comicsFile"].value;
        var cTitle = document.forms["myComic"]["comicsTitle"].value;
        var cAuthor = document.forms["myComic"]["comicsAuthor"].value;
        var cDesc = document.forms["myComic"]["comicsDescription"].value;

        if (comic == "") {
          swal("", "You must upload upload a cover first!", "error");
          return false;
        } else if (cTitle == "") {
          swal("","You must input a title first!", "error");
          return false;
        } else if (cAuthor == "") {
          aswal("","You must input an author first!", "error");
          return false;
        } else if (cDesc == "") {
          swal("","You must input a description first!", "error");
          return false;
        }
      }
    </script>
    <script>
    $(document).ready(function(){
      $('form input').change(function () {
        $('form p').text(this.files[0].name + " file is selected");
      });
    });
    </script>


</body>
</html>
