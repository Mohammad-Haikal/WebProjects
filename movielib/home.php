<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
} elseif (isset($_SESSION['signedUp']) && $_SESSION['signedUp']) {
} else {
    header('location: notFound.html');
    exit();
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
    <link rel="stylesheet" href="vendor/aos/aos.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <title>Movie Library</title>
</head>

<body>
    <input id="userId" type="text" value="<?php echo $_SESSION['userId'] ?>" disabled hidden>

    <nav>
        <div class="logo">
            <img src="./img/logo.png" alt="">
            <h1>MovieLib</h1>
        </div>

        <div class="profileInfo">
            <img src="./img/profile.png" alt="Profile">
            <h2><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></h2>
        </div>
        <h4 class="searchPage selected"> Search Movies</h4>
        <h4 class="fav">Favorites</h4>
        <h4 id="settingsBtn">Settings</h4>
        <a class="logout" href="./logout.php"><h4>Logout</h4></a>
    </nav>

    <div class="fadeBox" hidden>
        <i style="font-size:24px" class="fa" id="closeBtn">&#xf00d;</i>
        <h1>Settings</h1>
        <details>
            <summary>Change Your Name</summary>
            <form action="./handler.php" class="settingsForm" method="POST">
                <input type="text" name="changeFname" placeholder="First Name" required>
                <input type="text" name="changeLname" placeholder="Last Name" required>
                <input type="submit" name="updateName" value="Save">
            </form>
        </details>


        <details class="redbg">
            <summary>Update Your Password</summary>
            <form action="./handler.php" class="settingsForm" method="POST">
                <input type="password" name="changePassword" placeholder="New Password" required>
                <input type="password" name="changeRePassword" placeholder="Re-Enter Password" required>
                <input type="submit" name="updatePassword" value="Save">
            </form>
        </details>
    </div>

    <header>
        <div class="menuBtn">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div id="searchBar">
            <input id="aa" dir="auto" type="text" placeholder="Search Movie Name...">
            <button class="searchBtn">Search</button>
        </div>
    </header>


    <main>
        <div id="container">
            <!-- AJAX CALL -->
        </div>
    </main>

    <div class="pagesOptions">
        <span class="page-span page-span-active">1</span>
        <span class="page-span">2</span>
        <span class="page-span">3</span>
        <span class="page-span">4</span>
        <span class="page-span">5</span>
    </div>

    <script src="./vendor/aos/aos.js"></script>
    <script src="./js/script.js"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>