<?php
  include 'nav.php';
?>

<!--
TO DOs:
[✓] Drag and drop for xlsx file
[✓] Design for "fly" button to distinguish that it is a buton.
[✓] Add a "change file" button for xlsx upload. <- Not needed because it's automatic.
[✓] Add a filename to know what the user entered.
[✓] Make template link clickable for xlsx-format download.
[✓] Find a way to make template link clickable.
[+] Ajax functionality when "fly" button is clicked (send to localhost/wash-admin/private/uploadwithxlsx.php)
[+] Design for panel when a file is hovered, and when a file is entered.

LEGEND FOR TO DO:
  [+] - Add
  [x] - Modify
  [✓] - Accomplished

 -->

<title>Upload Survey Set</title>
<link rel="stylesheet" type="text/css" href="uploadsurveyset.css">
<script type="text/javascript" src="uploadsurveyset.js"></script>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


  <form class="" method="post" id="formFile" name="formFile">

    <div class="row no-gutters container-fluid">
      <div class="col-xl flexmine choice-container" id="xlsx">
        <div class="fixFlex rebutton rebutton-left">

          <div class="closeContainer takeWhole" id="closeContainerXlsx">
            <button type="button" class="closeButton" id="close-xlsx">
              <span style="font-size: 1.5em;">
                <i class="far fa-times-circle" id="close-icon-xlsx"></i>
              </span>
            </button>
          </div>

          <div class="mainContainer takeWhole" id="1">
          <div class="mainButton invi fixFlex" name="mainButton">
            <input type="file" name="inputFile" class="inputButton" id="inputFile">
                    <!-- this is the xlsx icon from fontawesome -->

                        <div style="font-size: 5em; align-self: center;" id="xlsx-logo">
                              <i class="far fa-file-excel green"></i>
                        </div>

                        <div class="special-title bring-to-front" id="xlsx-title">
                          Upload by xlsx
                        </div>

                      <div class="desc bring-to-front" id="xlsx-desc">
                        <div class="center-desc" id="the-desc-xlsx">
                          <ol class="alignOL">
                            <li>Download our spreadsheet <a href="public/downloadxlsx" class="download-link" download>template</a>.</li>
                            <li>Fillout out each row(worst to best answer).</li>
                            <li>Drag and drop the file in this tray or click here to open the file explorer.</li>
                            <li>Once the upload is done, send it away!</li>
                          </ol>
                        </div>

                        <div class="sendButton" id="flyButton">
                            <button type="button" class="flies" style="align-self: center;">
                              <span style="font-size: 4em; border-radius: 10px;">
                                <i class="fas fa-paper-plane" ></i>
                              </span>
                            </button>

                            <div class="sendText">
                              File is ready, let it fly!
                            </div>

                            <label class="file-name" id="file-name">

                            </label>

                        </div>

                        <div style="display: none;" id="change-file">
                          <button type="button" name="button">
                            Change File
                          </button>
                        </div>

                      </div>
          </div>

        </div>
      </div>
      </div>

      <div class="col-xl flexmine choice-container" id="makeset">
          <div class="fixFlex rebutton rebutton-right">

            <div class="closeContainer takeWhole" >
              <button type="button" class="closeButton" id="close-makeset">
                <span style="font-size: 1.5em; color: black;">
                  <i class="far fa-times-circle" id="close-icon-makeset"></i>
                </span>
              </button>
            </div>

            <div class="mainContainer takeWhole" id="2">

              <button class="mainButton" type="button" name="mainButton" >
                <div style="font-size: 5em; color: #212529;">
                    <i class="far fa-edit"></i>
                </div>

              <div class="special-title" style="color: black;">
                Make a set here
              </div>

                <div class="desc" id="makeset-desc">
                  <div class="center-desc">
                      <span style="color: black;">
                        You can create survey questions using our system, just click <a id="make-new-set"> here</a>.
                      </span>
                  </div>
                </div>
              </button>

             </div>

          </div>
        </div>
      </div>
    </div>


    <!-- this is where we will place the response for review. -->

    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" type="button">
              Collapsible Group Item #1
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            Hello putang ina
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" type="button">
              Collapsible Group Item #2
            </button>
          </h5>
        </div>

        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            It's another one.
          </div>
        </div>
      </div>
    </div>
  </form>

</body>
