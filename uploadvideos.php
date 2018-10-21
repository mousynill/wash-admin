<?php
  include 'nav.php';
?>

<head>
  <title>Upload Comics</title>
  <link rel="stylesheet" type="text/css" href="uploadvideos.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
</head>

<body>
  <div id="">
    <div id="progressBar" class="progress-bar bg-danger">
      <b id="progressText" class="lead">
        Upload Video
      </b>
    </div>
  </div>

  <!--Upload Form -->
  <form name ="myComic" method="POST" class="up" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="first" id="first">
      <div class="input-file">
      <input type="file" accept="video/mp4,video/*" name="videoFile" onchange="preview(this);">
      <img src="images/upload.png" height="100"width="125" alt="upload logo"></img>
        <p>Drag your files here or click in this area.</p>
      </input>
      <button type="submit" name="submitButton">Upload</button>
      </div>

      <div class="author">
        Title: <input type="text" name="comicsTitle"placeholder="Enter title here">
        <br>Author: <input type="text" name="videoAuthor" placeholder="Enter author here">
        <br>Price:  <input type="number" name="videoPrice" placeholder="Enter price here">
      </div>

      <div class="desc">
          Description:<br><textarea name="videoDescription"rows="8" cols="36" placeholder="Enter the description here"></textarea>
      </div>
    </div>

    <div class="first" id="second">
      <div class="progress" style="height:40px">
        <div class="progress-bar bg-danger" role="progressbar" style="width:20%" id="progressBar2">
          <b class="lead" id="progressText2"> Question 1 </b>
        </div>
      </div>
    </div>

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
          swal("", "You must upload upload a video first!", "error");
          return false;
        } else if (Title == "") {
          swal("","You must input a title first!", "error");
          return false;
        } else if (Author == "") {
          aswal("","You must input an author first!", "error");
          return false;
        } else if (Desc == "") {
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
