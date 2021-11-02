<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./sass/root.css">
    <title>Login</title>
</head>

<body>
    <h1 class="logoTitle">Movie Lib</h1>
    <main class="formsDiv">
        <form class="login-form" method="post" action="auth.php">
            <h1>Login</h1>
            <!-- <label for="username">username</label> -->
            <input type="text" name="username" placeholder="Username" required><br>
            <!-- <label for="password">Password</label> -->
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="loginSubmit" value="Login">
        </form>

        <form class="signup-form" method="post" action="signUp.php" autocomplete="off">
            <h1>Signup</h1>
            <!-- <label for="username">username</label> -->
            <input type="text" name="newUsername" placeholder="Username" autocomplete="off" required><br>
            <!-- <label for="password">Password</label> -->
            <input type="password" name="newPassword" placeholder="Password" autocomplete="off" required><br>
            <!-- <label for="password">Configure Password</label> -->
            <input type="password" name="newRePassword" placeholder="Configure Password" required><br>
            <input type="submit" name="signupSubmit" value="Signup">
        </form>
    </main>



</body>

</html>