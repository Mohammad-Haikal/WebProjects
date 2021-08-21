function next(){
    document.getElementById("preDiv").style.animation = "next1 1s forwards";
    document.getElementById("afterDiv").style.animation = "next2 1s forwards";
}

function back(){
    document.getElementById("preDiv").style.animation = "back1 1s backwards";
    document.getElementById("afterDiv").style.animation = "back2 1s backwards";
}


function enterNum(){
    var numOfCourses = document.getElementById('numOfCourses');
    var coursesContainer = document.getElementById('coursesContainer');

    if (coursesContainer.innerHTML != null) {
        if (numOfCourses.value >= 1 && numOfCourses.value <= 10) {

            coursesContainer.innerHTML = null;
            for (let i = 1; i <= numOfCourses.value; i++) {
                coursesContainer.innerHTML += `
                <div class= "courseDiv">
                <label>Course ${i}:</label>
                <input id="grade${i}" placeholder="Grade" type="number" min="1" max="4">
                <input id="hour${i}" placeholder="Hours" type="number" min="1" max="12">
                </div>`;
            }
        
            coursesContainer.innerHTML += `<button onclick="Calculate()">Calculate</button><br>`

        }
        else{
            coursesContainer.innerHTML = `<h1>Wrong Input</h1>`;
        }
              
    }
    

}


function Calculate(){
    let previousGpa = parseFloat(document.getElementById('previousGpa').value);
    let previousHours = parseFloat(document.getElementById('previousHours').value);

    let cumulativeGPA = 0;
    let semesterGPA = 0;
    let hoursSum = 0;

    for (let i = 1; i <= numOfCourses.value; i++) {
        semesterGPA += parseFloat(document.getElementById(`grade${i}`).value) * parseFloat(document.getElementById(`hour${i}`).value);
        hoursSum += parseFloat(document.getElementById(`hour${i}`).value);
    }

    semesterGPA /= hoursSum;
    semesterGPA = parseFloat(semesterGPA).toFixed(2);

    var semGpa = document.getElementById('semGpa');
    semGpa.value = semesterGPA;
    //----------------------------------------------

    cumulativeGPA = ((previousGpa * previousHours) + (semesterGPA * hoursSum)) / (previousHours + hoursSum);
    cumulativeGPA = parseFloat(cumulativeGPA).toFixed(2);
    
    var comGpa = document.getElementById('comGpa');
    comGpa.value = cumulativeGPA;

}