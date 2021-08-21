let lastScroll = 0;
var aboutY = window.scrollY + document.querySelector('#about').getBoundingClientRect().top // Y
var projectsY = window.scrollY + document.querySelector('#projects').getBoundingClientRect().top // Y
var contactY = window.scrollY + document.querySelector('#contact').getBoundingClientRect().top // Y
let n = 25;
let colors = ['orangered', 'orange', 'yellow', 'red'];


function randomN(min, max) {
    return Math.floor(Math.random() * (max - min) + min);;
    
}



var circlesDiv = document.getElementById('circlesDiv');

for (let i = 0; i < 10; i++) {
    circlesDiv.innerHTML += 
    `
    <div class="circleC">
        <div class="circle">
            
        </div>
    </div>
    

    `
    
}


var circle = document.getElementsByClassName('circle');
var circleC = document.getElementsByClassName('circleC');


for (let i = 0; i < circle.length; i++) {
    let widthHeigth = randomN(70,150);
    let degree = randomN(0, 360);
    circle[i].style.width = widthHeigth +'px';
    circle[i].style.height = widthHeigth +'px';
    circle[i].style.borderColor = colors[randomN(0,3)];
    circle[i].style.borderWidth = randomN(5,10) +'px';
    circle[i].style.borderRadius = randomN(5,50) +'%';
    
    circleC[i].style.margin  = randomN(0,30) +'vw';

    circleC[i].style.webkitTransform = 'rotate('+degree+'deg)'; 
    circleC[i].style.mozTransform    = 'rotate('+degree+'deg)'; 
    circleC[i].style.msTransform     = 'rotate('+degree+'deg)'; 
    circleC[i].style.oTransform      = 'rotate('+degree+'deg)'; 
    circleC[i].style.transform       = 'rotate('+degree+'deg)';

}











$(document).ready(function () {

    // Nav On Click:
    $('.navA', this).click(function (event) { 
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
      
            // Store hash
            var hash = this.hash;
      
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){
         
              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          } // End if


        $('.navA').removeClass('activeA');
        $(this).addClass('activeA');
        
    });


    // Nav On Scroll:
    $(window).scroll(function () { 
        const currentScroll = window.pageYOffset;
        let scrollDegree =  currentScroll /10;

        for (let i = 0; i < circle.length; i++) {
        circle[i].style.webkitTransform = 'rotate('+scrollDegree+'deg)'; 
        circle[i].style.mozTransform    = 'rotate('+scrollDegree+'deg)'; 
        circle[i].style.msTransform     = 'rotate('+scrollDegree+'deg)'; 
        circle[i].style.oTransform      = 'rotate('+scrollDegree+'deg)'; 
        circle[i].style.transform       = 'rotate('+scrollDegree+'deg)';
        }

        // console.log('aboutY-n: '+ (aboutY-n));
        // console.log('projectsY-n: '+ (projectsY-n));
        // console.log('contactY-n: '+ (contactY-n));
        // console.log('currentScroll: '+ currentScroll);

        if(currentScroll == 0){
            $('header').removeClass('stickyHeader', 200);
            
            $('.navA').removeClass('activeA');
            $('#homeA').addClass('activeA');
        }
        else{
            $('header').addClass('stickyHeader', 200);

        }

        if (currentScroll >= aboutY-n && currentScroll <= aboutY+n) {
            // console.log('reached About!!');
            $('.navA').removeClass('activeA');
            $('#aboutA').addClass('activeA');
        }

        else if (currentScroll >= projectsY-n && currentScroll <= projectsY+n) {
            // console.log('reached projectsY!!');
            $('.navA').removeClass('activeA');
            $('#projectsA').addClass('activeA');
        }

        else if (currentScroll >= contactY-n && currentScroll <= contactY+n) {
            // console.log('reached contactY!!');
            $('.navA').removeClass('activeA');
            $('#contactA').addClass('activeA');
        }

        


        // if(currentScroll > lastScroll){
        //     $('header').fadeOut(200);            
        // }
        // else{
        //     $('header').fadeIn(200);
        // }

        // lastScroll = currentScroll;
    });

});
