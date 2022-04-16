<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./sass/root.css">
    <title>Login System</title>
</head>

<body>
    <main>
        <h1>Welcome <?php echo $_SESSION['email']?>, you have logged in !!</h1>
        <a class="logout" href="./logout.php">Logout</a>
    </main>
</body>

</html>