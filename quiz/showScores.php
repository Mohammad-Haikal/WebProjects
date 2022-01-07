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
        }
    }
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
    <title>Quiz</title>
</head>

<body>
    <script src="./js/setAndReadCookie.js"></script>
    <header>
        <a id="logo" href="./index.html"><h1>Friendly Quiz</h1></a>
        <!-- <a href="#">My Quiz</a> -->
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
            $query =  mysqli_query($conn, "SELECT * FROM `peers_data`");
            while ($row = mysqli_fetch_assoc($query)){
                if($token == $row['token']){
                    echo "
                    <tr>
                        <td>".$row['peername']."</td>
                        <td>".$row['score']. " / " .$row['mark']."</td>
                    </tr>
                    ";
                }
            }
        ?>

        </tbody>
        </table>

        <h4>Now it's your turn!<br>Create a quiz about yoursef and send it to your friends!</h4>
        <a id="copyBtn" href="./index.html">Create Quiz</a>
        
    </main>

</body>

</html>