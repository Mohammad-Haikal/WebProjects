<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
}
elseif(isset($_SESSION['signedUp']) && $_SESSION['signedUp']){
}
else{
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
        <link rel="stylesheet" type="text/css" href="./sass/root.css">
        <link rel="stylesheet" href="vendor/aos/aos.css">
        <link rel="icon" href="./favicon.ico" type="image/x-icon">
        <title>Movie Library</title>
    </head>
    <body>

        <input id="userId" type="text" value="<?php echo $_SESSION['userId']?>" disabled hidden>
        <header>
            <div class="profileInfo">
                <img src="./img/profile.png" alt="Profile">
                <a href="./logout.php" title="Logout"><h4><?php echo $_SESSION['username']?></h4></a>
            </div>
            <div class="searchBar">
                <input id="aa" dir="auto" type="text" placeholder="Search Movie...">
            </div>
            <h1 class="fav">Favorites</h1>
        </header>

        <main>
            <div
                id="container"><!-- AJAX CALL -->
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
