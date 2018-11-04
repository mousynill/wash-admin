<?php
  include 'nav.php';
?>

<head>
  <title>Upload Videos</title>
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
  <div class="progress" style="height:30px">
    <div id="progressBar" class="progress-bar bg-danger" style="width:33%;">
      <b id="progressText" class="lead">Upload Videos</b>
    </div>
  </div>
<div class="col-md-6 bg-light rounded">
  <h4 class="text-center text-light bg-success mb-2 p-2 rounded lead" id="result">Eyy</h5>
</div>
  <!--Upload Form -->
  <form id="myVideo" name ="myVideo" method="POST" class="up" enctype="multipart/form-data">
    <div class="first" id="first" >
      <div class="input-file">
        <input type="file" accept="video/mp4,video/*" name="videoFile" onchange="preview(this);">
        <video id="video" style="display:none;"height="260"width="650" controls>
          <source id="source" type="video/mp4">
        </video>
        <img id="upload" src="images/upload.png" height="100"width="125" alt="upload logo">
        <p id="txt">Drag your files here or click in this area.</p>

        <div class="form-group mt-3">
          <a href="#" class="btn btn-success btn-block" id="next">Next</a>
        </div>
      <!--<button type="submit" name="submitButton">Upload</button>-->
      </div>

      <div class="author">
        Title: <input type="text" name="videoTitle" placeholder="Enter title here">
        <br>Author: <input type="text" name="videoAuthor" placeholder="Enter author here">
        <br>Price:  <input type="number" name="videoPrice" placeholder="Enter price here">
      </div>

      <div class="desc">
          Description:<br><textarea name="videoDescription" rows="8" cols="36" placeholder="Enter the description here"></textarea>
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
          <input type="text" class="form-control form-control-lg" name="question1" id="question1"placeholder="Enter your first question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control mb-2" name="ans1A" id="ans1A" placeholder="Enter the first choice here">
          <input type="text" class="form-control mb-2" name="ans1B" id="ans1B"placeholder="Enter the second choice here">
          <input type="text" class="form-control mb-2" name="ans1C"id="ans1C"placeholder="Enter the third choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="next-1">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-2">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg" name="question2" id="question2" placeholder="Enter your second question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control mb-2" name="ans2A" id="ans2A" placeholder="Enter the first choice here">
          <input type="text" class="form-control mb-2" name="ans2B" id="ans2B" placeholder="Enter the second choice here">
          <input type="text" class="form-control mb-2" name="ans2C" id="ans2C" placeholder="Enter the third choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev-2">Previous</a>
          <a href="#" class="btn btn-danger" id="next-2">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-3">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg" name="question3" id="question3" placeholder="Enter your third question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control mb-2" name="ans3A" id="ans3A" placeholder="Enter the first choice here">
          <input type="text" class="form-control mb-2" name="ans3B" id="ans3B" placeholder="Enter the second choice here">
          <input type="text" class="form-control mb-2" name="ans3C" id="ans3C" placeholder="Enter the third choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev-3">Previous</a>
          <a href="#" class="btn btn-danger" id="next-3">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-4">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg" name="question4" id="question4" placeholder="Enter your fourth question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control mb-2" name="ans4A" id="ans4A" placeholder="Enter the first choice here">
          <input type="text" class="form-control mb-2" name="ans4B" id="ans4B" placeholder="Enter the second choice here">
          <input type="text" class="form-control mb-2" name="ans4C" id="ans4C" placeholder="Enter the third choice here">
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev-4">Previous</a>
          <a href="#" class="btn btn-danger" id="next-4">Next</a>
        </div>
      </div>

      <div class=" p-2 bg-light" id="second-5">
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control form-control-lg "name="question5" id="question5"placeholder="Enter your fifth question here"><br>
        </div>
        <div class="col-sm-6 col-xs-2">
          <input type="text" class="form-control mb-2" name="ans5A" id="ans5A" placeholder="Enter the first choice here">
          <input type="text" class="form-control mb-2" name="ans5B" id="ans5B" placeholder="Enter the second choice here">
          <input type="text" class="form-control mb-2" name="ans5C" id="ans5C" placeholder="Enter the third choice here">
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
          <p id="ansQuestion1">Question 1 here</p><br>
        </div>
        <div class="radio">
          <input type="radio" value="Option1" name="optradio1" id="opt1A">
          <label for="opt1A" id="lbl1A" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio1" id="opt1B">
          <label for="opt1B" id="lbl1B" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio1" id="opt1C">
          <label for="opt1C" id="lbl1C" >Option 1</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="next2-1">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-2">
        <div class="col-sm-6 col-xs-2">
          <p id="ansQuestion2">Question2 here</p><br>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio2" id="opt2A">
          <label for="opt2A" id="lbl2A" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio2" id="opt2B">
          <label for="opt2B" id="lbl2B" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio2" id="opt2C">
          <label for="opt2C" id="lbl2C" >Option 1</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-2">Previous</a>
          <a href="#" class="btn btn-danger" id="next2-2">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-3">
        <div class="col-sm-6 col-xs-2">
          <p id="ansQuestion3">Question 3 here</p><br>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio3" id="opt3A">
          <label for="opt3A" id="lbl3A" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio3" id="opt3B">
          <label for="opt3B" id="lbl3B" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio3" id="opt3C">
          <label for="opt3C" id="lbl3C" >Option 1</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-3">Previous</a>
          <a href="#" class="btn btn-danger" id="next2-3">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-4">
        <div class="col-sm-6 col-xs-2">
          <p id="ansQuestion4">Question 4 here</p><br>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio4" id="opt4A">
          <label for="opt4A" id="lbl4A" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio4" id="opt4B">
          <label for="opt4B" id="lbl4B" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio4" id="opt4C">
          <label for="opt4C" id="lbl4C" >Option 1</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-4">Previous</a>
          <a href="#" class="btn btn-danger" id="next2-4">Next</a>
        </div>
      </div>

      <div class="p-2 bg-light" id="third-5">
        <div class="col-sm-6 col-xs-2">
          <p id="ansQuestion5">Question 5 here</p><br>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio5" id="opt5A">
          <label for="opt5A" id="lbl5A" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio5" id="opt5B">
          <label for="opt5B" id="lbl5B" >Option 1</label>
        </div>
        <div class="radio">
          <input type="radio" value="" name="optradio5" id="opt5C">
          <label for="opt5C" id="lbl5C" >Option 1</label>
        </div>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-danger" id="prev2-5">Previous</a>
          <input type="submit" class="btn btn-success" id="next2-5">
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

      $("#next").click(function(e){
        e.preventDefault();
        $("#first").hide();
        $("#second").show();
        $("#progressBar").css("width","60%");
        $("#progressBar").html("Create Questions");



        // var inputFile = document.getElementById('videoFile');
        // var file = inputFile.files[0];
        //
        // formData.append('file', file);
        // console.log(file);

        // for (var pair of formData.entries()) {
        //     console.log(pair[0]+ ', ' + pair[1]);
        // }


        });

      $("#next-1").click(function(e){
        e.preventDefault();

        /*if($("#question1").val() == ''){
          swal("", "Please input a question first!", "error");
          return false;
        } else if($("#ans1A").val() == ''){
          swal("", "Please input first choice first!", "error");
          return false;
        } else if($("#ans1B").val() == ''){
          swal("", "Please input second choice first!", "error");
          return false;
        } else if($("#ans1C").val() == ''){
          swal("", "Please input third choice first!", "error");
          return false;
        } else{
        //the code to next progress
        }*/
        $("#second-1").hide();
        $("#second-2").show();
        $("#progressBar2").css("width", "40%");
        $("#progressText2").html("Question 2");

        //console.log(document.getElementById("videoTitle").value);

      });
      $("#next-2").click(function(e){
        e.preventDefault();

        /*if($("#question2").val() == ''){
          swal("", "Please input a question first!", "error");
          return false;
        } else if($("#ans1A").val() == ''){
          swal("", "Please input first choice first!", "error");
          return false;
        } else if($("#ans2B").val() == ''){
          swal("", "Please input second choice first!", "error");
          return false;
        } else if($("#ans2C").val() == ''){
          swal("", "Please input third choice first!", "error");
          return false;
        } else{
        }*/
        $("#second-2").hide();
        $("#second-3").show();
        $("#progressBar2").css("width", "60%");
        $("#progressText2").html("Question 3");
      });
      $("#next-3").click(function(e){
        e.preventDefault();

        /*if($("#question3").val() == ''){
          swal("", "Please input a question first!", "error");
          return false;
        } else if($("#ans3A").val() == ''){
          swal("", "Please input first choice first!", "error");
          return false;
        } else if($("#ans3B").val() == ''){
          swal("", "Please input second choice first!", "error");
          return false;
        } else if($("#ans3C").val() == ''){
          swal("", "Please input third choice first!", "error");
          return false;
        } else{
        }*/
        $("#second-3").hide();
        $("#second-4").show();
        $("#progressBar2").css("width", "80%");
        $("#progressText2").html("Question 4");
      });
      $("#next-4").click(function(e){
        e.preventDefault();

        /*if($("#question4").val() == ''){
          swal("", "Please input a question first!", "error");
          return false;
        } else if($("#ans4A").val() == ''){
          swal("", "Please input first choice first!", "error");
          return false;
        } else if($("#ans4B").val() == ''){
          swal("", "Please input second choice first!", "error");
          return false;
        } else if($("#ans4C").val() == ''){
          swal("", "Please input third choice first!", "error");
          return false;
        } else{
        }*/
        $("#second-4").hide();
        $("#second-5").show();
        $("#progressBar2").css("width", "100%");
        $("#progressText2").html("Question 5");

      });
      $("#next-5").click(function(e){
        e.preventDefault();

        /*if($("#question5").val() == ''){
          swal("", "Please input a question first!", "error");
          return false;
        } else if($("#ans5A").val() == ''){
          swal("", "Please input first choice first!", "error");
          return false;
        } else if($("#ans5B").val() == ''){
          swal("", "Please input second choice first!", "error");
          return false;
        } else if($("#ans5C").val() == ''){
          swal("", "Please input third choice first!", "error");
          return false;
        } else{
        //the code to next progress
        }*/
        $("#second").hide();
        $("#third").show();
        $("#third-1").show();
        $("#progressBar").css("width", "100%");
        $("#progressBar").html("Define answer");

        //-----ARRANGEMENT BY NUMBER------
        //----ASSIGN VALUE OF QUEstion TO PARAGRAPH tag
        //----ASSIGN LABEL OF RADIO button
        //----ASSIGN VALUE OF RADIO BUTTON
        document.getElementById("ansQuestion1").innerHTML = document.getElementById("question1").value;
        document.getElementById("lbl1A").innerHTML = document.getElementById("ans1A").value;
        document.getElementById("opt1A").value = document.getElementById("ans1A").value;
        document.getElementById("lbl1B").innerHTML = document.getElementById("ans1B").value;
        document.getElementById("opt1B").value = document.getElementById("ans1B").value;
        document.getElementById("lbl1C").innerHTML = document.getElementById("ans1C").value;
        document.getElementById("opt1C").value = document.getElementById("ans1C").value;

        document.getElementById("ansQuestion2").innerHTML = document.getElementById("question2").value;
        document.getElementById("lbl2A").innerHTML = document.getElementById("ans2A").value;
        document.getElementById("opt2A").value = document.getElementById("ans2A").value;
        document.getElementById("lbl2B").innerHTML = document.getElementById("ans2B").value;
        document.getElementById("opt2B").value = document.getElementById("ans2B").value;
        document.getElementById("lbl2C").innerHTML = document.getElementById("ans2C").value;
        document.getElementById("opt2C").value = document.getElementById("ans2C").value;

        document.getElementById("ansQuestion3").innerHTML = document.getElementById("question3").value;
        document.getElementById("lbl3A").innerHTML = document.getElementById("ans3A").value;
        document.getElementById("opt3A").value = document.getElementById("ans3A").value;
        document.getElementById("lbl3B").innerHTML = document.getElementById("ans3B").value;
        document.getElementById("opt3B").value = document.getElementById("ans3B").value;
        document.getElementById("lbl3C").innerHTML = document.getElementById("ans3C").value;
        document.getElementById("opt3C").value = document.getElementById("ans3C").value;


        document.getElementById("ansQuestion4").innerHTML = document.getElementById("question4").value;
        document.getElementById("lbl4A").innerHTML = document.getElementById("ans4A").value;
        document.getElementById("opt4A").value = document.getElementById("ans4A").value;
        document.getElementById("lbl4B").innerHTML = document.getElementById("ans4B").value;
        document.getElementById("opt4B").value = document.getElementById("ans4B").value;
        document.getElementById("lbl4C").innerHTML = document.getElementById("ans4C").value;
        document.getElementById("opt4C").value = document.getElementById("ans4C").value;

        document.getElementById("ansQuestion5").innerHTML = document.getElementById("question5").value;
        document.getElementById("lbl5A").innerHTML = document.getElementById("ans5A").value;
        document.getElementById("opt5A").value = document.getElementById("ans5A").value;
        document.getElementById("lbl5B").innerHTML = document.getElementById("ans5B").value;
        document.getElementById("opt5B").value = document.getElementById("ans5B").value;
        document.getElementById("lbl5C").innerHTML = document.getElementById("ans5C").value;
        document.getElementById("opt5C").value = document.getElementById("ans5C").value;


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
      $("#next2-1").click(function(e){
        $("#third-1").hide();
        $("#third-2").show();
        $("#progressBar3").css("width", "40%");
        $("#progressText3").html("Answer Question 2");
      });
      $("#next2-2").click(function(e){
        $("#third-2").hide();
        $("#third-3").show();
        $("#progressBar3").css("width", "60%");
        $("#progressText3").html("Answer Question 3");

      });
      $("#next2-3").click(function(e){
        $("#third-3").hide();
        $("#third-4").show();
        $("#progressBar3").css("width", "80%");
        $("#progressText3").html("Answer Question 4");
      });
      $("#next2-4").click(function(e){
        $("#third-4").hide();
        $("#third-5").show();
        $("#progressBar3").css("width", "100%");
        $("#progressText3").html("Answer Question 5");

      });
      $("#next2-5").click(function(e){
        e.preventDefault();
        // $.ajax({
        //   url:'uploadvideosfunction.php',
        //   method:'POST',
        //   data:$("#myVideo").serialize(),
        //    success:function(response){
        //    swal("", "The Videos and Questions are succesfully uploaded!", "success");
        //    console.log(response);
        //   }
        // });

        var form = document.getElementById('myVideo');
        var formData = new FormData(form);

        for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
        }

        var xhr = new XMLHttpRequest();
      // Add any event handlers here...
      xhr.open('POST', 'uploadvideosfunction.php', true);
      xhr.send(formData);

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
    <!--<script>
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
      }-->
    </script>
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
