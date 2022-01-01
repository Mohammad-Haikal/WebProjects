<?php
session_start()

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
    <title>Quiz</title>
</head>

<body>
    <script src="./js/setAndReadCookie.js"></script>
    <header>
        <h1>MateQuiz</h1>
        <a href="#">My Quizzes</a>
    </header>
    <main class="finish">
        <h1>FINISHED</h1>
        <p>Link</p>
        <input type="text" id="linkInput">
        <button id="copyBtn">Copy</button>
    </main>

    <script>
        var urlBase = `${location.href.substring(0, location.href.lastIndexOf("/")+1)}start.php?token=<?php echo $_COOKIE['token'] ?>`;
        $("#linkInput").val(urlBase);

        $('#copyBtn').click(function(event) {
            // const targetInput = document.getElementById('copyable');
            $('#linkInput').select();
            document.execCommand('copy');
            //navigator.clipboard.writeText(targetInput.getAttribute('data-url'));
            alert("Link Copied");
        });
    </script>
</body>

</html>