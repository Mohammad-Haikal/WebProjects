var playerChoice;
var result = document.getElementById("resultBox");
var info = document.getElementById("info");

var playerResult = 0;
var botResult = 0;

var rock = document.getElementById("rock");
var paper = document.getElementById("paper");
var scissors = document.getElementById("scissors");


function rockPressed() {
    // Random between 0 and 2
    var botChoice = Math.floor(Math.random() * 3);
    playerChoice = 0;
    // console.log("Rock: "+ playerChoice);
    // console.log("Bot: "+ botChoice);
    result.value = "Rock Pressed!";
    // Compare
    compareResults(playerChoice, botChoice);
}

function paperPressed() {
    // Random between 0 and 2
    var botChoice = Math.floor(Math.random() * 3);
    playerChoice = 1;
    // console.log("Paper: "+playerChoice);
    // console.log("Bot: "+ botChoice);
    result.value = "Paper Pressed!";
    // Compare
    compareResults(playerChoice, botChoice);
}

function scissorsPressed() {
    // Random between 0 and 2
    var botChoice = Math.floor(Math.random() * 3);
    playerChoice = 2;
    // console.log("Scissors: "+playerChoice);
    // console.log("Bot: "+ botChoice);
    result.value = "Scissors Pressed!";
    // Compare
    compareResults(playerChoice, botChoice);
}


function compareResults(player, bot){
    /*
    0: Rock
    1: Paper
    2: Scissors
    */

    if(player == 0 && bot == 0){
        brown(rock);
        info.innerHTML = "Draw!";
        result.value = playerResult + " - " + botResult;
    }
    else if(player == 1 && bot == 1){
        brown(paper);
        info.innerHTML = "Draw!";
        result.value = playerResult + " - " + botResult;
    }
    else if(player == 2 && bot == 2){
        brown(scissors);
        info.innerHTML = "Draw!";
        result.value = playerResult + " - " + botResult;
    }

    //----------------------------------------
    else if(player == 0 && bot == 1){
        green(rock);
        red(paper);
        info.innerHTML = "Lose!";
        botResult++;
        result.value = playerResult + " - " + botResult;
    }
    else if(player == 0 && bot == 2){
        green(rock);
        red(scissors);
        info.innerHTML = "Win!";
        playerResult++;
        result.value = playerResult + " - " + botResult;
    }


    else if(player == 1 && bot == 0){
        green(paper);
        red(rock);
        info.innerHTML = "Win!";
        playerResult++;
        result.value = playerResult + " - " + botResult;
    }
    else if(player == 1 && bot == 2){
        green(paper);
        red(scissors);
        info.innerHTML = "Lose!";
        botResult++;
        result.value = playerResult + " - " + botResult;
    }


    else if(player == 2 && bot == 0){
        green(scissors);
        red(rock);
        info.innerHTML = "Lose!";
        botResult++;
        result.value = playerResult + " - " + botResult;
    }
    else if(player == 2 && bot == 1){
        green(scissors);
        red(paper);
        info.innerHTML = "Win!";
        playerResult++;
        result.value = playerResult + " - " + botResult;
    }

    //clear data afer 1 second
    setTimeout(resetBColor, 700);
}

function green(x) { 
    x.classList.add('green-glow');
}

function red(x) { 
    x.classList.add('red-glow');
}

function brown(x) { 
    x.classList.add('brown-glow');
}

function resetBColor() { 
    rock.classList.remove('red-glow');
    paper.classList.remove('red-glow');
    scissors.classList.remove('red-glow');
    rock.classList.remove('green-glow');
    paper.classList.remove('green-glow');
    scissors.classList.remove('green-glow');
    rock.classList.remove('brown-glow');
    paper.classList.remove('brown-glow');
    scissors.classList.remove('brown-glow');

    info.innerHTML = ""
 }


