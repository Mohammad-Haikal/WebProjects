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
    <title>Quiz</title>
</head>

<body>
    <script src="./js/setAndReadCookie.js"></script>
    <header>
        <a id="logo" href="./index.html"><h1>Friendly Quiz</h1></a> 
        <a href="./myQuiz.php">My Quiz</a>
    </header>
    <main class="finish">
        <h1>FINISHED</h1>
        <p>Your link is ready!</p>
        <input type="text" id="linkInput">
        <p class="copied">Copied!</p>
        <button id="copyBtn">Copy</button>
    </main>

    <script>
        var urlBase = `${location.href.substring(0, location.href.lastIndexOf("/")+1)}start.php?token=<?php echo $_COOKIE['token'] ?>`;
        $("#linkInput").val(urlBase);

        $('#copyBtn').click(function(e) {
            $('#linkInput').select();
            document.execCommand('copy');
            $('.copied').fadeIn(100);
        });
    </script>
</body>

</html>