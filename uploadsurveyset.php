<?php
  include 'nav.php';
?>

<!--
TO DO BY RNILL:
[-] Drag and drop for xlsx file
[-] Ajax functionality when "fly" button is clicked
[X] Background for "fly" button to distinguish that it is a buton.

LEGEND FOR TO DO:
  [X] - Modify
  [-] - Add
  [✓] - Accomplished
 -->

<title>Upload Survey Set</title>
<link rel="stylesheet" type="text/css" href="uploadsurveyset.css">
<script type="text/javascript" src="uploadsurveyset.js"></script>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<div class="container-fluid">

    <form class="row no-gutters" method="post" id="formFile" name="formFile">

      <div class="col-xl flexmine choice-container" id="xlsx">
        <div class="fixFlex rebutton rebutton-left">

          <div class="closeContainer takeWhole">
            <button type="button" class="closeButton" id="close-xlsx">
              <span style="font-size: 1.5em;">
                <i class="far fa-times-circle" id="close-icon-xlsx"></i>
              </span>
            </button>
          </div>

          <div class="mainContainer takeWhole" id="1">
          <div class="mainButton invi fixFlex" name="mainButton">
                      <input type="file" name="xlsx-file" class="inputButton" id="inputFile">
                    <!-- this is the xlsx icon from fontawesome -->

                        <div style="font-size: 5em; align-self: center;" id="xlsx-logo">
                              <i class="far fa-file-excel"></i>
                        </div>

                        <div class="special-title" id="xlsx-title">
                          Upload by xlsx
                        </div>

                      <div class="desc" id="xlsx-desc">
                        <div class="center-desc" id="the-desc-xlsx">
                          <ol class="alignOL">
                            <li>Download our spreadsheet <a href="#">template</a>.</li>
                            <li>Fillout out each row(worst to best answer).</li>
                            <li>Drag and drop the file in this tray or click here to open the file explorer.</li>
                            <li>Once the upload is done, click okay to finalize.</li>
                          </ol>
                        </div>

                        <div class="sendButton" id="flyButton">

                              <span style="font-size: 4em; align-self: center; background-color: blue; border-radius: 10px;">
                                <i class="fas fa-paper-plane"></i>
                              </span>

                            <div class="sendText">
                              File is ready, let it fly!
                            </div>

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
    </form>
</body>
