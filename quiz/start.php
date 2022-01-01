<?php
if (!isset($_GET['token'])) {
    http_response_code(404);
    die;
}
else{
    session_start();
    $_SESSION['token'] = $_GET['token'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./jquery/jquery.js"></script>
        <script src="./jquery/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./sass/root.css">
        <title>Start Quiz</title>
    </head>

    <body>
        <script src="./js/setAndReadCookie.js"></script>
        <header>
            <h1>MateQuiz</h1>
            <a href="#">My Quizzes</a>
        </header>
        <main>
            <div class="boxContainer">
                <form action="#" class="questionsForm">
                    <div class="questions"></div>

                    <button type="submit">Finish</button>
                </form>
            </div>
        </main>

        <script src="./js/quizFormat.js"></script>
    </body>

</html>
