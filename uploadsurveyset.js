
$(document).ready(function(){

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
      $("#close-xlsx").css("display", "flex");
      document.getElementById("1").style.alignItems = "stretch"; //placed in top center
      $("#1").off('mouseleave'); //this disables the hover effect.
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
      $("#close-makeset").css("display", "flex");
      document.getElementById("2").style.alignItems = "stretch";
      $("#2").off('mouseleave');

  });

  $("#close-xlsx").click(function(){

  });


})
