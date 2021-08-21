$(document).ready(function(){
    $("#flip").click(function(){
      $("#panel").slideToggle("slow");
    });
  });

function myFunction(x) {
    x.classList.toggle("change");
}