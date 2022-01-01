$(function () {
    $.ajax({
        type: "post",
        url: "./getData.php",
        success: function (response) {
            response = JSON.parse(response);
            var response = response;

            prepareQuiz(response);
        }
    });


});



function prepareQuiz(response) {
    for (const i in response) {

        $('.questions').append(
            `
            <div class="question">
                <div>
                    <p>Question ${parseInt(i) + 1}</p>
                </div>
                <h3 id="q${i}">${response[i].question} </h3>
                <section id="answers${i}" class="answers">
                    
                </section>
            </div>
            `
        );

        for (const j in response[i].answers) {
            $(`#answers${i}`).append(
                `
                <div class="answer">
                    <div id="radio${i}${j}" class="checkBox r${i}"></div>
                    <h4>${response[i].answers[j]}</h4>
                </div>
                <hr>
                `
            );

            $(`#radio${i}${j}`).click(function (e) {
                e.preventDefault();


                correctAnswer = response[i].correctAnswer;
                answer = $(`#radio${i}${j}`)[0].nextElementSibling.innerHTML;

                if (correctAnswer == answer) {
                    $(this).addClass('checkBoxA');

                }
                else {
                    $(this).addClass('checkBoxWrong');

                }

                $(`.r${i}`).unbind("click");

            });

        }

    }



}

