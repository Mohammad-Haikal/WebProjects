<?php
if (!isset($_GET['token'])) {
    header("location: ./error.html");
    die;
}
else{
    session_start();
    include 'connectDB.php';
    $token = $_GET['token'];

    $query =  mysqli_query($conn, "SELECT * FROM `data`");
    while ($row = mysqli_fetch_assoc($query)){
        if($token == $row['token']){
            $creator = $row['creator']; 
            $mark = $row['mark'];
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
    <title>Friendly Quiz</title>
</head>

<body>
    <script type="text/javascript" src="./js/setAndReadCookie.js"></script>
    <header>
        <a id="logo" href="./index.html"><img src="./img/logo.png"></img></a> 
        <a href="./myQuizzes.php">My Quizzes</a>
    </header>
    <main class="finish">
        <h1><?php echo $creator?>'s quiz</h1>

        <table id="scoreTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
        </thead>
        
        <tbody>                  
    
        <?php
            $query =  mysqli_query($conn, "SELECT * FROM `peers`");
            while ($row = mysqli_fetch_assoc($query)){
                if($token == $row['token']){
                    echo "
                    <tr>
                        <td>".$row['peername']."</td>
                        <td>".$row['score']. " / " .$mark."</td>
                    </tr>
                    ";
                }
            }
        ?>

        </tbody>
        </table>
        <div class="slideUp">
        <h3>Now it's your turn!!!</h3>
        <h4>Create a quiz about yoursef and send it to your friends!</h4>
        <a id="copyBtn" href="./index.html">Create Quiz!</a>
        </div>
    </main>
    <footer>
        <h4>Contact the developer <a href="https://wa.me/+962790580502">Muhammad Haikal</a></h4>
    </footer>
</body>

</html>