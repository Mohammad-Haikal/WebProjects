

$(document).ready(function(){   
    for (let i = 1; i <= 11; i++) {
        $(`#courseImg${i}`).click(function(){
            $(`#courseP${i}`).slideToggle(500);
            $(`#courseH${i}`).slideToggle(500);
        }); 
        
    }
});