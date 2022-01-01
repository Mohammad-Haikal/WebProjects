var username = readCookie('username');
var mark = 0;

var randomQuestions = [
	`What is ${username}'s best friend's name?`,
	`What is ${username}'s favorite animal?`,
	`What is ${username}'s favorite city in the United States?`,
	`What is ${username}'s favorite color?`,
	`What is ${username}'s favorite country?`,
	`What is ${username}'s favorite day of the week?`,
	`What is ${username}'s favorite drink in the summer?`,
	`What is ${username}'s favorite food?`
]


function getRandomQs() {
	let n = Math.floor(Math.random() * randomQuestions.length);
	return n;
}


myQuestions = [
	{
		question: `What is ${username}'s favorite day of the week?`,
		answers: ["Saturday", "Thursday", "Friday"],
		correctAnswer: null
	},
	{
		question: `What is ${username}'s favorite color?`,
		answers: ["Blue", "Green", "Red", "Yellow"],
		correctAnswer: null
	},
	{
		question: `What is ${username}'s favorite animal?`,
		answers: ["Dog", "Cat", "Bird"],
		correctAnswer: null
	}
];




function updateData() {
	let divs = $('.questions')[0].children;

	for (let i = 0; i < divs.length; i++) {
		myQuestions[i].question = divs[i].children[1].innerText;

		let answers = divs[i].children[2].getElementsByClassName('answer');

		for (let j = 0; j < answers.length; j++) {
			myQuestions[i].answers[j] = answers[j].children[1].innerHTML;
		}


	}
}



for (const i in myQuestions) {

	$('.questions').append(
		`
		<div class="question">
			<div>
				<p>Question ${parseInt(i) + 1}</p>
				<img id="randomBtn${i}" class="randomBtn" src="./img/random.png">
			</div>
			<h3 id="q${i}" contenteditable="true">${myQuestions[i].question} </h3>
			<section id="answers${i}" class="answers">
				
			</section>
			<button type="button" class="addAn" onclick="appendAn(${i})">+ Add Answer</button>
		</div>
		`
	);

	for (const j in myQuestions[i].answers) {
		$(`#answers${i}`).append(
			`
			<div class="answer">
				<div id="radio${i}${j}" class="checkBox r${i}" onclick="correctRadio(${i}, ${j})"></div>
				<h4 contenteditable="true">${myQuestions[i].answers[j]}</h4>
				<i id="delete${i}${j}" onclick="deleteRadio(${i}, ${j})" class="fa fa-remove delIcon"></i>
			</div>
			<hr>
			`
		);


	}


	$(`#randomBtn${i}`).click(function (e) {
		e.preventDefault();

		myQuestions[i].question = randomQuestions[getRandomQs()];
		$(`#q${i}`).html(myQuestions[i].question);
	});



}

function appendQs() {

	myQuestions.push(
		{
			question: randomQuestions[getRandomQs()],
			answers: ["New Answer"],
			correctAnswer: null
		},
	)

	let myQuestionsLngth = myQuestions.length - 1;

	$('.questions').append(
		`
		<div class="question">
			<div>
				<p>Question ${myQuestionsLngth + 1}</p>
				<img id="randomBtn${myQuestionsLngth}" class="randomBtn" src="./img/random.png">
				<i id="delete${myQuestionsLngth}" onclick="deleteQs(${myQuestionsLngth})" class="fa fa-remove delIcon"></i>
			</div>
			<h3 id="q${myQuestionsLngth}" contenteditable="true">${myQuestions[myQuestionsLngth].question} </h3>
			<section id="answers${myQuestionsLngth}" class="answers">
				<div class="answer">
					<div id="radio${myQuestionsLngth}${0}" class="checkBox r${myQuestionsLngth}" onclick="correctRadio(${myQuestionsLngth}, ${0})"></div>
					<h4 contenteditable="true">${myQuestions[myQuestionsLngth].answers[0]}</h4>
					<i id="delete${myQuestionsLngth}${0}" onclick="deleteRadio(${myQuestionsLngth}, ${0})" class="fa fa-remove delIcon"></i>
				</div>
				<hr>
			</section>
			<button type="button" class="addAn" onclick="appendAn(${myQuestionsLngth})">+ Add Answer</button>
		</div>
		`
	);

	$(`#randomBtn${myQuestionsLngth}`).click(function (e) {
		e.preventDefault();
		myQuestions[myQuestionsLngth].question = randomQuestions[getRandomQs()];
		$(`#q${myQuestionsLngth}`).html(myQuestions[myQuestionsLngth].question);
	});



}

function appendAn(i) {

	myQuestions[i].answers.push("New Answer");

	let answersLngth = myQuestions[i].answers.length - 1;


	$(`#answers${i}`).append(
		`
			<div class="answer">
				<div id="radio${i}${answersLngth}" class="checkBox r${i}" onclick="correctRadio(${i}, ${answersLngth})"></div>
				<h4 contenteditable="true">${myQuestions[i].answers[answersLngth]}</h4>
				<i id="delete${i}${answersLngth}" onclick="deleteRadio(${i}, ${answersLngth})" class="fa fa-remove delIcon"></i>
			</div>
			<hr>
			`
	);


}


function correctRadio(i, j) {
	$(`.r${i}`).removeClass('checkBoxA');
	$(`#radio${i}${j}`).addClass('checkBoxA');
	
	myQuestions[i].correctAnswer = $(`#radio${i}${j}`)[0].nextElementSibling.innerHTML;
	

	$($(`#radio${i}${j}`).siblings('h4')[0]).keyup(function (e) {
		e.preventDefault();
		
		$(`.r${i}`).removeClass('checkBoxA');
	});
}



function deleteRadio(i, j) {
	$(`#delete${i}${j}`)[0].parentNode.nextElementSibling.remove();
	$(`#delete${i}${j}`)[0].parentNode.remove();

	var index = myQuestions[i].answers.indexOf(myQuestions[i].answers[j]);
	myQuestions[i].answers.splice(index, 1);

}

function deleteQs(i) {
	$(`#delete${i}`)[0].parentNode.parentNode.remove();


	var index = myQuestions.indexOf(myQuestions[i]);
	myQuestions.splice(index, 1);

}





function validateAnswers() {
	mark = 0;
	for (let i = 0; i < myQuestions.length; i++) {
		if (myQuestions[i].correctAnswer == null) {
			$('#errorMessage').html(`Please choose the right answer for Question ${i+1}`)
			// break;
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
		setCookie('data', JSON.stringify(myQuestions), 30)
		e.currentTarget.submit();
	}
	else{
		e.preventDefault();
	}
	
	
});
