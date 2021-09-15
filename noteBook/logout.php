<?php
session_start();
$fp = fopen('log.txt', 'a');//opens file in append mode  
fwrite($fp,"\nLogged out\n====================\n".$_SESSION['username']."\n\nDate: ". $_SESSION['date']."\nTime: ". $_SESSION['time']. "\n====================\n\n");
session_destroy();
header("Location: index.php")
?>