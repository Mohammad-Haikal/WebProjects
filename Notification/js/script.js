$(document).ready(function () {
    $('#notifiBtn').click(function () { 
        $('.notification').fadeToggle(function() {
            $('.notification > span').fadeIn();
        });
        // console.log()
        
    });
});



let n = 0
function add(){
    n++;
    document.getElementById('numOfN').innerHTML = n;
}




