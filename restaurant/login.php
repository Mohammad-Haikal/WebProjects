<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="./jquery/jquery.js"></script>
    <script src="./jquery/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="./sass/root.css" />
    <title>Restaurant</title>
</head>

<body>
    <div class="background blurred" id="background"><img src="./img/home.jpg" /></div>
    <header>
        <h1>الحناين</h1>
        <nav class="headerNav">
            <ul>
                <li>
                    <a href="./index.html#main">Home</a>
                </li>
                <li>
                    <a href="./index.html#menu">Menu</a>
                </li>
                <li>
                    <a href="./index.html#contact">Contact</a>
                </li>
                <li class="logInA">
                    <a href="#">Log in</a>
                </li>
            </ul>
        </nav>
    </header>

    <form class="logInForm" action="./auth.php" method="POST">
        <label>Username</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" name="logInSubmit">
    </form>


</body>

</html>