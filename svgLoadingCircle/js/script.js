let loader = document.getElementById('loader');

let childs = loader.children;

function rotateDivs(){
  for (i = 0; i < childs.length; i++) {
    childs[i].style.transform = `rotate(${i * 40}deg)`;
  }
}
rotateDivs();


$(function () {
  $('.loader').click(function () { 
    $(this).toggleClass('loaderActive');
    
    
  });    
});
  

     