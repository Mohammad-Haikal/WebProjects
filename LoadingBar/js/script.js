var tag = document.getElementById('container');
var n = 100;
 
for (let i = 0; i < n; i++) {
    tag.innerHTML += `<div class="whiteBox" id="w${i}"></div>`;
    
}


var i = 0;                  
var j = n-1;
function myLoop() {         
  setTimeout(function() {   
    
    document.getElementById(`w${i}`).classList.toggle('blackbox');
    i++;  
    
    document.getElementById(`w${j}`).classList.toggle('blackbox');
    j--;

    if (i < n) {           
      myLoop();             
    }
    else{
      i = 0;                  
      j = n-1;  
      myLoop();
    }                       
  }, 500)
}


    myLoop(); 
    

   



  