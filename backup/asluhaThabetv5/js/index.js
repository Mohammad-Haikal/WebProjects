var slideIndex = 0;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
showSlides();

function showSlides() {
  var i;
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 5 seconds
}


function showS(n){
  console.log(n);
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[n].style.display = "block";  
  dots[n].className += " active";
  slideIndex = n;


}

