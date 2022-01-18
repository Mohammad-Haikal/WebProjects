let lastScroll = 0;
var aboutY = window.scrollY + document.querySelector('#about').getBoundingClientRect().top // Y
var projectsY = window.scrollY + document.querySelector('#projects').getBoundingClientRect().top // Y
var contactY = window.scrollY + document.querySelector('#contact').getBoundingClientRect().top // Y
var n = 25;

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
    });

});
