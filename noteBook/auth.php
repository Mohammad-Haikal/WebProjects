<?php
session_start();

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
} 

date_default_timezone_set("Asia/Amman");
$_SESSION['username'] = $_POST["username"];
$_SESSION['password'] = $_POST["password"];
$_SESSION['date'] = date('j/n/Y');
$_SESSION['time'] = date('h:i a');
$_SESSION['ip'] = getIPAddress();

// Open log.txt (append mode)  
$fp = fopen('log.txt', 'a');

if($_SESSION['username'] == "muhhl" && $_SESSION['password'] == "muh@20001#hl"){

    $_SESSION['loggedin'] = true;
    fwrite($fp,"\n===== New Access! =====\n". $_SESSION['username']. "\nIP Address: ". $_SESSION['ip']. "\nDate: ". $_SESSION['date']. "\nTime: ". $_SESSION['time']."\n=======================\n");

    // Redirect
    header("Location: index2.php");
}

elseif($_SESSION['username'] == "nouf" && $_SESSION['password'] == "nn@98#nouff"){

    $_SESSION['loggedin'] = true;
    fwrite($fp,"\n===== New Access! =====\n". $_SESSION['username']. "\nIP Address: ". $_SESSION['ip']. "\nDate: ". $_SESSION['date']. "\nTime: ". $_SESSION['time']."\n=======================\n");
    
    // Redirect
    header("Location: index2.php");
}

else{
    $_SESSION['loggedin'] = false;
    fwrite($fp,"\n===== Wrong Access!!!! ====="."\nUsername: ". $_SESSION['username']."\nPassword: ". $_SESSION['password']."\nIP Address: ". $_SESSION['ip']."\nUser Agent: ". $_SERVER['HTTP_USER_AGENT']. "\nDate: ". $_SESSION['date']. "\nTime: ". $_SESSION['time']."\n============================\n");

    // Redirect
    header("Location: index.php");
}
?>
