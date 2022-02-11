<?php
if (!isset($_GET['token'])) {
    header("location: ./error.html");
    die;
} else {
    session_start();
    $token = $_GET['token'];
    $_SESSION['token'] = $token;
    $_COOKIE['token'] = $token;

    include 'connectDB.php';
    $query =  mysqli_query($conn, "SELECT * FROM `data`");
    while ($row = mysqli_fetch_assoc($query)) {
        if ($token == $row['token']) {
            $creator = $row['creator'];
            break;
        }
    }
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
    <title><?php echo $creator?>'s Quiz</title>
</head>

<body>
    <script type="text/javascript" src="./js/setAndReadCookie.js"></script>
    <header>
        <a id="logo" href="./index.html"><img src="./img/logo.png"></img></a>
        <a href="./myQuizzes.php">My Quizzes</a>
    </header>
    <main>
        <div class="boxContainer">
            <h2 class="slided">Prove how well you know <strong><?php echo $creator; ?></strong>!?</h2>
            <form action="./storePeer.php" method="POST" class="questionsForm">
                <label for="peerName">What's your name?</label>
                <input dir="auto" id="peerName" type="text" name="peerName" required>
                <div class="questions"></div>
                <button type="submit">Finish</button>
            </form>
        </div>
    </main>
    <footer>
        <h4>Contact the developer <a href="https://wa.me/+962790580502">Muhammad Haikal</a></h4>
    </footer>
    
    <script type="text/javascript" src="./js/quizFormat.js"></script>
</body>

</html>