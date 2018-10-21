<?php
  include 'nav.php';
?>

<head>
  <link rel="stylesheet" type="text/css" href="upload.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
  <title>Upload Videos</title>
</head>

<body>
  <!-- nill wag mo kalimutan pag-isahin yung form. Saka isame mo yung name sa TITLE, AUTHOR, DESCRIPTION. (refer to uploadvideosfunction.php)  -->

  <div id="progressBar" class="progress-bar bg-danger">
    <b id="progressText" class="lead">
      Upload Video
    </b>
  </div>

  <!--Upload Form -->
<div class="body">
  <form name="myForm" action="uploadvideosfunction.php" method="POST" class="up" enctype="multipart/form-data" onsubmit="return validateForm()">

  <div id="first">

    <div class="first-col">

        <div class="input-file">
            <input type="file" accept="video/mp4,video/*" name="videoFile" onchange="preview(this);">
            </input>

            <video id="video" style="display:none;"height="260"width="650" controls>
              <source id="source" type="video/mp4">
            </video>

            <img id="upload" src="images/upload.png" height="100"width="125" alt="upload logo">
            <p id="txt">Drag your files here or click in this area.</p>
        </div>

        <div class="upload-button">
          <button type="submit" name="SubmitButton">Upload</button>
        </div>

    </div>

      <div class="author">
        Title:  <input type="text" name="videoTitle" placeholder="Enter title here">
        <br>Author:   <input type="text" name="videoAuthor" placeholder="Enter author here">
        <br>Price:  <input type="number" name="videoPrice" placeholder="Enter price here">
      </div>
      <div class="desc">
          Description:<br><textarea name="videoDescription"rows="8" cols="36" placeholder="Enter the description here"></textarea>
      </div>
    </div>

  <!-- <div id="second">
    <div class="form-group">

    </div>
  </div> -->
  </form>
</div>



  <!--End of description form-->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#uvideos").addClass("active");
    })
  </script>

<!--script for validation -->
  <script>
    function validateForm() {
      var vid = document.forms["myForm"]["videoFile"].value;
      var title = document.forms["myForm"]["videoTitle"].value;
      var author = document.forms["myForm"]["videoAuthor"].value;
      var desc = document.forms["myForm"]["videoDescription"].value;
      var allow = "<?php echo $allowed?>";

      if (vid == "") {
        swal("", "You must upload upload a video first!", "error");
        return false;
      } else if (title == "") {
        swal("","You must input a title first!", "error");
        return false;
      } else if (author == "") {
        alert("You must input an author first!");
        return false;
      } else if (desc == "") {
        alert("You must input a description first!");
        return false;
      }
    }
  </script>

  <!-- for video preview -->
  <script>
    function preview(self){
      var file = self.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        var src = e.target.result;
        var video = document.getElementById("video");
        var source = document.getElementById("source");

        source.setAttribute("src", src);
        video.style.display="block";

        document.getElementById("txt").style.lineHeight = "45px"; //changes the line-height of the paragraph when a video uploaded
        document.getElementById("txt").style.height = "13.5%";
        document.getElementById("upload").style.display = "none";
        video.load();


      };
      reader.readAsDataURL(file);
    }

  </script>


</body>
</html>
