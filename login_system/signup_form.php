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
    <form class="signup-form" method="post" action="signup.php" autocomplete="off">
        <h1>Signup</h1>

        <div>
            <img src="./img/username.png" alt="">
            <input type="email" name="newEmail" placeholder="email" autocomplete="off" required>
        </div>

        <div>
            <img src="./img/password.png" alt="">
            <input type="password" name="newPassword" placeholder="Password" autocomplete="off" required>
        </div>

        <div>
            <img src="./img/password.png" alt="">
            <input type="password" name="newRePassword" placeholder="Configure Password" required>
        </div>

        <p>Have an account? <a href="index.php">Log in</a></p>

        <input id="signup" type="submit" name="signupSubmit" value="Signup">
    </form>


</body>

</html>