<?php
session_start();
// Overwrite SESSION date and time variables
date_default_timezone_set("Asia/Amman");
$_SESSION['date'] = date('j/n/Y');
$_SESSION['time'] = date('h:i a');

// Open file in append mode  
$fp = fopen('log.txt', 'a');
fwrite($fp,"\n===== Logged out =====\n".$_SESSION['username']. "\nIP Address: ". $_SESSION['ip']."\nDate: ". $_SESSION['date']."\nTime: ". $_SESSION['time']. "\n======================\n\n");

// Destroy session (All it's varaibles)
session_destroy();

// Redirect to Login Page
header("Location: index.php")
?>