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

      <div class="col-xl flexmine choice-container" id="xlsx">
        <div class="fixFlex rebutton rebutton-left">

          <div class="closeContainer takeWhole" id="close-xlsx">
            <button type="button" class="closeButton">X</button>
          </div>

          <div class="mainContainer takeWhole" id="1">

            <button class="mainButton" type="button" name="mainButton" >Upload by xlsx

              <div class="desc" id="xlsx-desc">
                <div class="center-desc">
                  <ol class="alignOL">
                    <li>Download the our spreadsheet <a href="#">template</a>.</li>
                    <li>Fillout out each row(worst to best answer).</li>
                    <li>Drag and drop the file in this tray or click <a href="#">here</a> to open the file explorer.</li>
                    <li>Once the upload is done, click okay to finalize.</li>
                  </ol>
                </div>
              </div>

            </button>

           </div>

        </div>
      </div>

      <div class="col-xl flexmine choice-container" id="makeset">
        <div class="fixFlex rebutton rebutton-right">

          <div class="closeContainer takeWhole" id="close-makeset">
            <button type="button" class="closeButton">X</button>
          </div>

          <div class="mainContainer takeWhole" id="2">

            <button class="mainButton" type="button" name="mainButton" >Make a set here
              <div class="desc" id="makeset-desc">
                <div class="center-desc">
                    <span>
                      You can create survey questions using our system, just click <a href="#"> here</a>.
                    </span>
                </div>
              </div>
            </button>

           </div>

        </div>
      </div>

</div>
</body>
