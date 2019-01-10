
$(document).ready(function(){

  $("#1").on('mouseenter',function(){
    $("#xlsx").css("flexGrow","5");
    $("#xlsx-desc").fadeIn("slow");
  });

  $("#1").on('mouseleave', function(){
    $("#xlsx").css("flexGrow","1");
    $("#xlsx-desc").fadeOut("slow");
  })

  $("#1").click(function(){
      $("#makeset").hide();
      $("xlsx-desc").show();
      $("#1").off('mouseleave');
  });

  $("#2").on('mouseenter',function(){
    $("#makeset").css("flexGrow","5");
    $("#makeset-desc").fadeIn("slow");
  });

  $("#2").on('mouseleave', function(){
    $("#makeset").css("flexGrow","1");
    $("#makeset-desc").fadeOut("slow");
  })

  $("#2").click(function(){
      $("#xlsx").hide();
      $("makeset-desc").show();
      $("#2").off('mouseleave');
  });

})
