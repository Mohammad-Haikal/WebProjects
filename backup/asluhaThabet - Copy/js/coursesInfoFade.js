

$(document).ready(function(){   
    for (let i = 1; i <= 11; i++) {
        $(`#courseImg${i}`).click(function(){
            $(`#courseP${i}`).toggle(500);
            $(`#courseH${i}`).toggle(500);
        }); 
        
    }
});