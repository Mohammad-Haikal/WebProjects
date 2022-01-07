<?php
if (!isset($_GET['token'])) {
    header("location: ./error.html");
    die;
}
else{
    session_start();
    $_SESSION['token'] = $_GET['token'];
    $_COOKIE['token'] = $_GET['token'];
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
        <a id="logo" href="./index.html"><h1>Friendly Quiz</h1></a> 
        <a href="./myQuiz.php">My Quiz</a>
    </header>
        <main>
            <div class="boxContainer">
                <!-- <h4 id="createdBy"></h4> -->
                <form action="./storePeer.php" method="POST" class="questionsForm">
                    <label for="peerName">What's your name</label>
                    <input id="peerName" type="text" name="peerName" required>
                    <div class="questions"></div>
                    <button type="submit">Finish</button>
                </form>
            </div>
        </main>

        <script src="./js/quizFormat.js"></script>
    </body>

</html>
