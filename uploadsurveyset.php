<?php
  include 'nav.php';
?>


  <title>Upload Survey Set</title>
  <link rel="stylesheet" type="text/css" href="uploadsurveyset.css">
  <script type="text/javascript" src="uploadsurveyset.js"></script>
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">

<div class="container-fluid">

  <div class="row no-gutters">

      <div class="col-xl flexmine" id="xlsx">
        <div class="clickedContainer rebutton rebutton-left natureOfFlow">

          <!-- <div class="closeContainer">
            <button type="button" name="closeButton">X</button>
          </div> -->

          <div class="mainContainer">

            <button class="mainButton" type="button" name="mainButton" id="1">Upload by xlsx
              <div class="desc" id="xlsx-desc">
                sample
              </div>
            </button>

           </div>

        </div>
      </div>

      <div class="col-xl flexmine" id="makeset">
          <button class="rebutton rebutton-right" type="button" id="2">Make a set here
          <div class="desc" id="makeset-desc">
              sample
          </div>
        </button>
      </div>

  </div>
</div>
</body>
