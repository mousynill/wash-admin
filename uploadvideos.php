<?php
  include 'nav.php';
?>

<head>
  <title>Upload Comics</title>
  <link rel="stylesheet" type="text/css" href="uploadvideos.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">

  <style type="text/css">
    #second, #second-2, #second-3, #second-4, #second-5, #third, #third-2, #third-3,
    #third-4, #third-5{
      display:none;
    }
  </style>
</head>

<body>
  <div class="progress mb-3" style="height:30px">
    <div id="progressBar" class="progress-bar bg-danger" style="width:70%;">
      <b id="progressText" class="lead">Create Questions</b>
    </div>
  </div>

  <!--Upload Form -->
  <form name ="myComic" method="POST" class="up" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="first" id="first" >
      <div class="input-file">
      <input type="file" accept="video/mp4,video/*" name="videoFile" onchange="preview(this);">
      <img src="images/upload.png" height="100"width="125" alt="upload logo"></img>
        <p>Drag your files here or click in this area.</p>
      </input>
      <a href="#" class="btn btn-success btn-block" id="next">Next</a>
      <!--<button type="submit" name="submitButton">Upload</button>-->
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

    <div class="row justify-content-center">
    <div class="col-lg-8 mt-5 bg-light"id="second">
      <div class="progress mb-3" style="height:40px">
        <div class="progress-bar bg-danger" role="progressbar" style="width:20%" id="progressBar2">
          <b class="lead" id="progressText2"> Question 1 </b>
        </div>
      </div>
      <div class="p-2 bg-light" id="second-1">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg"name="question" placeholder="Enter your first question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control" placeholder="Enter the first choice here">
          <input type="text" class="form-control" placeholder="Enter the second choice here">
          <input type="text" class="form-control" placeholder="Enter the third choice here">
          <input type="text" class="form-control" placeholder="Enter the fourth choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="next-1">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-2">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg"name="question" placeholder="Enter your second question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control" placeholder="Enter the first choice here">
          <input type="text" class="form-control" placeholder="Enter the second choice here">
          <input type="text" class="form-control" placeholder="Enter the third choice here">
          <input type="text" class="form-control" placeholder="Enter the fourth choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev-2">Previous</a>
          <a href="#" class="btn btn-danger" id="next-2">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-3">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg"name="question" placeholder="Enter your third question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control" placeholder="Enter the first choice here">
          <input type="text" class="form-control" placeholder="Enter the second choice here">
          <input type="text" class="form-control" placeholder="Enter the third choice here">
          <input type="text" class="form-control" placeholder="Enter the fourth choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev-3">Previous</a>
          <a href="#" class="btn btn-danger" id="next-3">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-4">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg"name="question" placeholder="Enter your fourth question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control" placeholder="Enter the first choice here">
          <input type="text" class="form-control" placeholder="Enter the second choice here">
          <input type="text" class="form-control" placeholder="Enter the third choice here">
          <input type="text" class="form-control" placeholder="Enter the fourth choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev-4">Previous</a>
          <a href="#" class="btn btn-danger" id="next-4">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-5">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg"name="question" placeholder="Enter your fifth question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control" placeholder="Enter the first choice here">
          <input type="text" class="form-control" placeholder="Enter the second choice here">
          <input type="text" class="form-control" placeholder="Enter the third choice here">
          <input type="text" class="form-control" placeholder="Enter the fourth choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev-5">Previous</a>
          <a href="#" class="btn btn-success" id="next-5">Finish</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-8 mt-5 bg-light"id="third">
      <div class="progress mb-3" style="height:40px">
        <div class="progress-bar bg-danger" role="progressbar" style="width:20%" id="progressBar3">
          <b class="lead" id="progressText3"> Answer Question 1 </b>
        </div>
      </div>
      <div class="p-2 bg-light" id="third-1">
        <div class="col-sm-6 col-xs-2">
          Question 1 here<br><br>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 1</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 4</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="next2-1">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-2">
        <div class="col-sm-6 col-xs-2">
          Question 2 here<br><br>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 1</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 4</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-2">Previous</a>
          <a href="#" class="btn btn-danger" id="next2-2">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-3">
        <div class="col-sm-6 col-xs-2">
          Question 3 here<br><br>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 1</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 4</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-3">Previous</a>
          <a href="#" class="btn btn-danger" id="next2-3">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-4">
        <div class="col-sm-6 col-xs-2">
          Question 4 here<br><br>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 1</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 4</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-4">Previous</a>
          <a href="#" class="btn btn-danger" id="next2-4">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-5">
        <div class="col-sm-6 col-xs-2">
          Question 5 here<br><br>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 1</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 4</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-5">Previous</a>
          <button type="submit" name="submitButton" class="btn btn-success" id="next2-5">Finish</a>
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

      $("#next").click(function(){
        $("#first").hide();
        $("#second").show();
      });
      $("#next-1").click(function(){
        $("#second-1").hide();
        $("#second-2").show();
        $("#progressBar2").css("width", "40%");
        $("#progressText2").html("Question 2");
      });
      $("#next-2").click(function(){
        $("#second-2").hide();
        $("#second-3").show();
        $("#progressBar2").css("width", "60%");
        $("#progressText2").html("Question 3");
      });
      $("#next-3").click(function(){
        $("#second-3").hide();
        $("#second-4").show();
        $("#progressBar2").css("width", "80%");
        $("#progressText2").html("Question 4");
      });
      $("#next-4").click(function(){
        $("#second-4").hide();
        $("#second-5").show();
        $("#progressBar2").css("width", "100%");
        $("#progressText2").html("Question 5");
      });
      $("#next-5").click(function(){
        $("#second").hide();
        $("#third").show();
        $("#third-1").show();
        $("#progressBar").css("width", "100%");
        $("#progressBar").html("Define answer");
      });
      $("#prev-2").click(function(){
        $("#second-2").hide();
        $("#second-1").show();
        $("#progressBar2").css("width", "20%");
        $("#progressText2").html("Question 1");
      });
      $("#prev-3").click(function(){
        $("#second-3").hide();
        $("#second-2").show();
        $("#progressBar2").css("width", "40%");
        $("#progressText2").html("Question 2");
      });
      $("#prev-4").click(function(){
        $("#second-4").hide();
        $("#second-3").show();
        $("#progressBar2").css("width", "60%");
        $("#progressText2").html("Question 3");
      });
      $("#prev-5").click(function(){
        $("#second-5").hide();
        $("#second-4").show();
        $("#progressBar2").css("width", "80%");
        $("#progressText2").html("Question 4");
      });

      //------THIRD PROGRESS BAR --------
      $("#next2-1").click(function(){
        $("#third-1").hide();
        $("#third-2").show();
        $("#progressBar3").css("width", "40%");
        $("#progressText3").html("Answer Question 2");
      });
      $("#next2-2").click(function(){
        $("#third-2").hide();
        $("#third-3").show();
        $("#progressBar3").css("width", "60%");
        $("#progressText3").html("Answer Question 3");
      });
      $("#next2-3").click(function(){
        $("#third-3").hide();
        $("#third-4").show();
        $("#progressBar3").css("width", "80%");
        $("#progressText3").html("Answer Question 4");
      });
      $("#next2-4").click(function(){
        $("#third-4").hide();
        $("#third-5").show();
        $("#progressBar3").css("width", "100%");
        $("#progressText3").html("Answer Question 5");
      });
      $("#prev2-2").click(function(){
        $("#third-2").hide();
        $("#third-1").show();
        $("#progressBar3").css("width", "20%");
        $("#progressText3").html("Answer Question 1");
      });
      $("#prev2-3").click(function(){
        $("#third-3").hide();
        $("#third-2").show();
        $("#progressBar3").css("width", "40%");
        $("#progressText3").html("Answer Question 2");
      });
      $("#prev2-4").click(function(){
        $("#third-4").hide();
        $("#third-3").show();
        $("#progressBar3").css("width", "60%");
        $("#progressText3").html("Answer Question 3");
      });
      $("#prev2-5").click(function(){
        $("#third-5").hide();
        $("#third-4").show();
        $("#progressBar3").css("width", "80%");
        $("#progressText3").html("Answer Question 4");
      });

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
