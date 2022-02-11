<?php
include 'connectDB.php';
$creator = [];
$mark = [];

if (isset($_COOKIE['tokensArray'])) {
    $tokensArray = json_decode($_COOKIE['tokensArray']);

    for ($i=0; $i < count($tokensArray); $i++) { 
        $query =  mysqli_query($conn, "SELECT * FROM `data`");

        while ($row = mysqli_fetch_assoc($query)){
            if($tokensArray[$i] == $row['token']){
                array_push($creator, $row['creator']);
                array_push($mark, $row['mark']);
                break;     
            }
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
        <a href="#">My Quizzes</a>
    </header>
    <main class="finish">
        
        <?php

            if (isset($_COOKIE['tokensArray'])) {
                $tokensArray = json_decode($_COOKIE['tokensArray']);

                for ($j=0; $j < count($tokensArray); $j++) { 
                    $query =  mysqli_query($conn, "SELECT * FROM `peers`");
                    
                    echo "
                    <h2 class='qTitle'>$creator[$j]'s quiz</h2>
                    <div class='linkDiv' id='div$tokensArray[$j]'>
                        <h4>Link:</h4>
                        <input type='text' id='$tokensArray[$j]'></input>
                        <button class='copySent' id='copySent$tokensArray[$j]'>Copy</button>
                        <button class='deleteSent' onclick='deleteQz(`$tokensArray[$j]`)'>Delete</button>
                    </div>
                    ";
                    echo "
                    <table id='scoreTable'>
                    <thead>
                    <tr>
                        <th>Friend Name</th>
                        <th>Score</th>
                    </tr>
                    
                    </thead>
                    <tbody>
                    ";
    
                    while ($row = mysqli_fetch_assoc($query)){
                        if($tokensArray[$j] == $row['token']){
                            echo "
                            <tr>
                                <td class='peersName'>".$row['peername']."</td>
                                <td class='peersScore'>".$row['score']. " / " .$mark[$j]."</td>
                            </tr>
                            ";
                        }
                        
                    }
                    echo "
                    </tbody>
                    </table>                    
                    ";
    
                }

            }else {
                echo "<h2>No quizzes created so far.</h2>"; 
            }
        ?>
        <a id="copyBtn" href="./index.html">Create New Quiz</a>

    </main>
    <footer>
        <h4>Contact the developer <a href="https://wa.me/+962790580502">Muhammad Haikal</a></h4>
    </footer>

    <script>
        var tokensArray = JSON.parse(readCookie('tokensArray'));
        var urlBase;
        tokensArray.forEach(token => {
            urlBase = `${location.href.substring(0, location.href.lastIndexOf("/")+1)}start.php?token=${token}`;
            $(`#${token}`).val(urlBase);

            $(`#copySent${token}`).click(function(e) {
                $(`#${token}`).select();
                document.execCommand('copy');
            });
            
        });
    </script>

<script type="text/javascript" src="./js/deleteQuiz.js"></script>
</body>
</html>