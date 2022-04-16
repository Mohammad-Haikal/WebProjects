

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>loginForm</title>
</head>
<body>
    <div class="container">
        <form method="post" action="storeInfo.php">
            <h1 id="titleH">Login Form</h1>
                <input name="username" class="input" type="text" placeholder="Enter Username"><br>
                <input name="password" class="input" type="password" placeholder="Enter Password"><br>
                <input class="subBut" type="submit">
        </form>
    
        <div class="showdataBtn"><a href="./adminLogin.php">Admin Room</a></div>
    
    
    </div>


    <script>
        var tag = document.getElementById('titleH');
        tag.innerHTML = "Welcome back " + document.cookie + "!" 
        console.log("document.cookie   " + document.cookie);
    </script>
    



    <?php
    //------------------------------------------------------

    // if(!isset($_COOKIE[$cookie_name])) {
    //     echo "Cookie named '" . $cookie_name . "' is not set!";
    // } else {
    //     echo "Cookie '" . $cookie_name . "' is set!<br>";
    //     echo "Value is: " . $cookie_value;
    // }
    
    


    // if (!empty($cookie_value)) {
    //     echo "
    //     <script>
    //         document.getElementById('titleH').innerHTML = '$cookie_value';
    //     </script>
        
    //     ";
    // }
    

    //-----------------------------------------------------
    
    ?>







</body>
</html>