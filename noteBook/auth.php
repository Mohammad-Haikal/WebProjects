<?php
if($_POST["username"] == "muhhl" && $_POST["password"] == "muh@20001#hl"){

    session_start();
    date_default_timezone_set("Asia/Amman");
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['username'] = 'muhhl';
    $_SESSION['date'] = date('j-n-Y');
    $_SESSION['time'] = date('h:i a');

    // Open log.txt (append mode)  
    $fp = fopen('log.txt', 'a');
    fwrite($fp,"\nNew Access!\n====================\n". $_SESSION['username'] . "\n\n". "Date: ". $_SESSION['date']. "\n". "Time: ". $_SESSION['time']."\n====================\n");
    
    // Redirect
    header("Location: index2.php");
}

elseif($_POST["username"] == "nouf" && $_POST["password"] == "nn@98#nouff"){
    session_start();
    date_default_timezone_set("Asia/Amman");
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['username'] = 'nouf';
    $_SESSION['date'] = date('j-n-Y');
    $_SESSION['time'] = date('h:i a');

    // Open log.txt (append mode)  
    $fp = fopen('log.txt', 'a');
    fwrite($fp,"\nNew Access!\n====================\n". $_SESSION['username'] . "\n\n". "Date: ". $_SESSION['date']. "\n". "Time: ". $_SESSION['time']."\n====================\n");

    // Redirect
    header("Location: index2.php");
}

else{
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
    $ip = getIPAddress();  

    $fp = fopen('log.txt', 'a');
    fwrite($fp,"\n====================\nWrong Access!!!!"."\nIP Address: ". $ip."\nUser Agent: ". $_SERVER['HTTP_USER_AGENT'] ."\n====================\n");

    // Redirect
    header("Location: index.php");
}
?>
