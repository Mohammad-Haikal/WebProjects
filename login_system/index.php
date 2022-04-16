<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./sass/root.css">
    <title>Login System</title>
</head>

<body class="indexBody">


    <form class="login-form" method="post" action="auth.php">
        <h1>Login</h1>

        <div>
            <img src="./img/username.png" alt="">
            <input type="email" name="email" placeholder="email" required>
        </div>

        <div>
            <img src="./img/password.png" alt="">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <p>Don't have an account? <a href="signup_form.php">Sign up</a></p>

        <input id="login" type="submit" name="loginSubmit" value="Login">
    </form>

</body>

</html>