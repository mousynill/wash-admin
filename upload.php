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

  <!--Upload Form -->
  <form name="myForm" action="uploadvideosfunction.php" method="POST" class="up" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="input-file">
      <input type="file" accept="video/mp4,video/*" name="videoFile" onchange="preview(this);">
    </input>
    <video id="video" style="display:none;"height="260"width="650" controls >
      <source id="source" type "video/mp4">
      </video>
      <p id="txt">Drag your video here or click in this area.</p>
    <button type="submit" name="SubmitButton">Upload</button>
    </div>
    <div class="author">
      Title: <input type="text" name="videoTitle" placeholder="Enter title here">
      <br><br><br>Author: <input type="text" name="videoAuthor" placeholder="Enter author here">
    </div>
    <div class="desc">
        Description:<br><textarea name="videoDescription"rows="8" cols="36" placeholder="Enter the description here"></textarea>
    </div>
  </form>
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
        alert("You must upload upload a video first!");
        return false;
      } else if (title == "") {
        alert("You must input a title first!");
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
        video.load();


      };
      reader.readAsDataURL(file);
    }

  </script>


</body>
</html>
