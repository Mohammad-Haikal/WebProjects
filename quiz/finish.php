<?php
if (!isset($_COOKIE['token'])) {
    header("location: ./error.html");
    die;
}
?>

<!DOCTYPE html>
<html dir="auto">

<head>
    <link rel="icon" href="logo.ico"/>
    <meta charset="UTF-8">
    <meta name="author" content="Muhammad Haikal">
    <meta name="description" content="Create a quiz to know how well your best friends know you!">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./jquery/jquery.js"></script>
    <script type="text/javascript" src="./jquery/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./sass/root.css">
    <title>Friendly Quiz</title>
</head>

<body>
    <script type="text/javascript" src="./js/setAndReadCookie.js"></script>
    <header>
        <a id="logo" href="./index.html"><img src="./img/logo.png"></img></a> 
        <a href="./myQuizzes.php">My Quizzes</a>
    </header>
    <main class="finish">
        <h1>FINISHED</h1>
        <p>Your link is ready!</p>
        <input type="text" id="linkInput">
        <p class="copied">Copied!</p>
        <button id="copyBtn">Copy</button>
    </main>
    <footer>
        <h4>Contact the developer <a href="https://wa.me/+962790580502">Muhammad Haikal</a></h4>
    </footer>

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