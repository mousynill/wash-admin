
$(document).ready(function(){
  $("#inputFile").hide();

  $("#1").on('mouseenter',function(){
    $("#xlsx").animate({flexGrow: "5"}, "fast");
    $("#xlsx-desc").fadeIn("fast");
  });

  $("#1").on('mouseleave', function(){
    $("#xlsx").animate({flexGrow: "1"}, "fast");
    $("#xlsx-desc").fadeOut("fast");
  })

  $("#1").click(function(){
      $("#makeset").hide();
      $("xlsx-desc").show();
      $("#close-xlsx").css("visibility", "visible");
      document.getElementById("1").style.alignItems = "stretch"; //placed in top center
      $("#1").off('mouseleave'); //this disables the hover effect
      // $("#inputFile").css("display", "flex");
      $("#inputFile").show();

  });

  $("#close-xlsx").on('click', function(){
      $("#xlsx").animate({flexGrow: "1"}, "fast");
      $("#makeset").show(); //this shows the makeset panel
      $("#inputFile").hide();
      $("#close-xlsx").css("visibility", "hidden"); //this hides the close button for xlsx
      $("#xlsx-desc").fadeOut("fast");
      $("#1").on('mouseleave', function(){
        $("#xlsx").animate({flexGrow: "1"}, "fast");
        $("#xlsx-desc").fadeOut("fast");
      })
      $("#inputFile").val(null); //this resets the input.
  });

  $("#2").on('mouseenter',function(){
    $("#makeset").animate({flexGrow: "5"}, "fast");
    $("#makeset-desc").fadeIn("fast");
  });

  $("#2").on('mouseleave', function(){
    $("#makeset").animate({flexGrow: "1"}, "fast");
    $("#makeset-desc").fadeOut("fast");
  })

  $("#2").click(function(){
      $("#xlsx").hide();
      $("makeset-desc").show();
      $("#close-makeset").css("visibility", "visible");
      document.getElementById("2").style.alignItems = "stretch";
      $("#2").off('mouseleave');
  });

  $("#close-makeset").on('click', function(){
      $("#makeset").animate({flexGrow: "1"}, "fast");
      $("#xlsx").show(); //this shows the makeset panel
      $("#close-makeset").css("visibility", "hidden"); //this hides the close button for xlsx
      $("#makeset-desc").fadeOut("fast");
      $("#2").on('mouseleave', function(){
        $("#makeset").animate({flexGrow: "1"}, "fast");
        $("#makeset-desc").fadeOut("fast");
      })
  });


  // $('form input').change(function () {
  //   $('form p').text(this.files.length + " file(s) selected");
  // });


$('#inputFile').on('change',function(){
      if($('#inputFile').val() != ""){
          //this means the input has a file now

          $("#the-desc-xlsx").css("display", "none");
          $("#flyButton").css("display","flex");
          $('#xlsx-title').hide();
          $('#xlsx-logo').hide();

          $('#inputFile').css('z-index', '-1');
          $("#inputFile").prop("disabled", true); //this disables the input - set to not clickable
      }else{
        alert("No file uploaded");
      }
});

$('#flyButton').on('click', function(){
  console.log("hello im working");
  // $.ajax({
  //   url: './uploadwithxlsx.php',
  //   type: 'post',
  //   dataType: 'json',
  //   data: $("#formFile").serialize(),
  //   success: function(data){
  //     console.log(data);
  //   }
  // })
});

})
