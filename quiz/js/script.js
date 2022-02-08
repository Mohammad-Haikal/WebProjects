var username = readCookie('username');
var mark = 0;
var tokensArray = [];


$(function () {
	$('#createdBy').html(`${username}'s Quiz`);
});


class Question {
	constructor(question, answers) {
		this.question = question;
		this.answers = answers;
		this.correctAnswer = null;
	}
}

var random = [];
var i = 0;
while (random.length < 6) {
	var r = Math.floor(Math.random() * 7);
	if (random.indexOf(r) === -1) random.push(r);
}

function createNewQs() {
	let randomQuestions = [
		{
			question: `What is ${username}'s favorite day of the week?`,
			answers: ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
		},
		{
			question: `What is ${username}'s favorite color?`,
			answers: ["Black", "Blue", "Green", "Red", "Yellow", "Orange"]
		},
		{
			question: `What is ${username}'s favorite animal?`,
			answers: ["Dog", "Cat", "Bird", "Tiger", "Lion", "Elephant", "Panda", "Giraffe"]
		},
		{
			question: `What is ${username}'s best friend's name?`,
			answers: ["Rere", "Lovey", "Lolo"]
		},
		{
			question: `What is ${username}'s favorite country?`,
			answers: ["France", "Spain", "United States", "China"]
		},
		{
			question: `What is ${username}'s favorite drink in the summer?`,
			answers: ["Pepsi", "Fruit Juice", "Coconut Water", "Lemonade"]
		},
		{
			question: `What is ${username}'s favorite food?`,
			answers: ["Burger", "Fruits", "Shawerma", "Pizza"]
		}
	]




	if (i == 6) {
		i = 0;
	}
	console.log(random[i])
	let question = randomQuestions[random[i]].question;
	let answers = randomQuestions[random[i]].answers;
	let q = new Question(question, answers);
	i++;
	return q;
}

var myQuestions = [
	createNewQs(),
	createNewQs(),
	createNewQs()
]

update();


function addQ() {
	myQuestions.push(createNewQs());
	update();
}


function removeQs(i) {
	myQuestions.splice(myQuestions.indexOf(myQuestions[i]), 1);
	update();
}


function addAn(i, answer) {
	myQuestions[i].answers.push(answer);
	update();
}


function removeAn(i, j) {
	myQuestions[i].answers.splice(myQuestions[i].answers.indexOf(myQuestions[i].answers[j]), 1);
	update();
}

function randomizeQs(i) {
	myQuestions[i] = createNewQs();
	update();
}


function updateData() {
	let divs = $('.questions')[0].children;

	for (let i = 0; i < divs.length; i++) {
		myQuestions[i].question = divs[i].children[1].value;

		let answers = divs[i].children[2].getElementsByClassName('answer');

		for (let j = 0; j < answers.length; j++) {
			myQuestions[i].answers[j] = answers[j].children[1].value;
		}
	}
}


function update() {
	let count = 1;
	$('.questions').html("");
	for (const i in myQuestions) {

		$('.questions').append(
			`
			<div class="question">
				<div>
					<p class="qTitle">Question ${parseInt(i) + 1}</p>
					<img id="randomBtn${i}" class="randomBtn" onclick="randomizeQs(${i})" src="./img/random.png" >
					<i id="delete${i}" onclick="removeQs(${i})" class="fa fa-remove delIcon"></i>
				</div>
				<textarea dir="auto" id="q${i}" class="questionTextarea">${myQuestions[i].question} </textarea>
				
				<section id="answers${i}" class="answers">
					
				</section>
				<button type="button" class="addAn" onclick="addAn(${i}, 'New Answer')">+ Add Answer</button>
			</div>
			`
		);

		for (const j in myQuestions[i].answers) {
			$(`#answers${i}`).append(
				`
				<div class="answer">
					<div id="radio${i}${j}" class="checkBox r${i}" onclick="correctRadio(${i}, ${j})"></div>
					<textarea dir="auto">${myQuestions[i].answers[j]}</textarea>
					<i id="delete${i}${j}" onclick="removeAn(${i}, ${j})" class="fa fa-remove delIcon"></i>
				</div>
	
				`
			);

			if (myQuestions[i].correctAnswer == $(`#radio${i}${j}`)[0].nextElementSibling.value) {
				$(`#radio${i}${j}`).addClass('checkBoxA');
			}

		}
	}
}



function correctRadio(i, j) {
	$(`.r${i}`).removeClass('checkBoxA');
	$(`#radio${i}${j}`).addClass('checkBoxA');

	myQuestions[i].correctAnswer = $(`#radio${i}${j}`)[0].nextElementSibling.value;

	$($(`#radio${i}${j}`).siblings('textarea')).keyup(function (e) {
		e.preventDefault();
		$(`.r${i}`).removeClass('checkBoxA');
	});
}


function validateAnswers() {
	mark = 0;
	for (let i = 0; i < myQuestions.length; i++) {
		if (myQuestions[i].correctAnswer == null) {
			$('#errorMessage').html(`Please choose the right answer for Question ${i + 1}`)
			return false;
		}
		else if (myQuestions[i].correctAnswer != null) {
			mark++;
			$('#errorMessage').html("");

		}
	}

	return true;
}


$('.questionsForm').submit(function (e) {
	e.preventDefault();

	if (validateAnswers()) {
		setCookie("token", generate_token(15), 30);

		if (readCookie('tokensArray') != null) {
			tokensArray = JSON.parse(readCookie('tokensArray'));
		}
		tokensArray.push(readCookie('token'));
		setCookie("tokensArray", JSON.stringify(tokensArray), 30);
		setCookie('data', JSON.stringify(myQuestions), 30);
		setCookie('mark', mark, 30);

		e.currentTarget.submit();
	}
	else {
		e.preventDefault();
	}

});
