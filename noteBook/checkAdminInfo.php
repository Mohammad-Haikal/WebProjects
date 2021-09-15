<?php
if($_POST["username"] == "muhnouf" && $_POST["password"] == "muhnouf"){
    session_start();
    $_SESSION['loggedin'] = TRUE;
    header("Location: index2.php");
}else{
    header("Location: index.php");
}
?>
