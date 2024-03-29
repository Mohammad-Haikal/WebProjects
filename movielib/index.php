<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./sass/root.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <title>Movie Library</title>
</head>

<body class="indexBody">

    <div class="rect">
        <div class="indexHeader">
            <h1 class="logoTitle"><img src="./img/logo.png" alt="Logo"> Movie Library</h1>
        </div>

        <div class="formsDiv">
            
            <form class="login-form" method="post" action="auth.php">
                <h1>Login</h1>
                <div>
                    <img src="./img/username.png" alt="">
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div>
                    <img src="./img/password.png" alt="">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <input id="login" type="submit" name="loginSubmit" value="Login">
            </form>

            <h4>Or</h4>

            <form class="signup-form" method="post" action="signup.php" autocomplete="off">
                <h1>Signup</h1>

                <div class="sInput">
                    <label for="">First Name</label>
                    <input type="text" name="newFirstName" autocomplete="off" required>
                    <label for="">Last Name</label>
                    <input type="text" name="newLastName" autocomplete="off">
                </div>

                <div>
                    <img src="./img/username.png" alt="">
                    <input type="text" name="newUsername" placeholder="Username" autocomplete="off" required>
                </div>

                <div>
                    <img src="./img/password.png" alt="">
                    <input type="password" name="newPassword" placeholder="Password" autocomplete="off" required>
                </div>

                <div>
                    <img src="./img/password.png" alt="">
                    <input type="password" name="newRePassword" placeholder="Configure Password" required>
                </div>

                <input id="signup" type="submit" name="signupSubmit" value="Signup">
            </form>
        </div>
    </div>
    <!-- </div> -->






</body>

</html>