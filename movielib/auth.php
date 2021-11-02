<?php
session_start();
include 'db_connect.php';
$userFound = false;


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



if (isset($_POST['loginSubmit'])){
    date_default_timezone_set("Asia/Amman");
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Open log.txt (append mode)  
    $fp = fopen('log.txt', 'a');

    $selectResult = mysqli_query($conn, "SELECT * FROM `moviedb`");

    while ($row = mysqli_fetch_assoc($selectResult)) {
        // Check if the username and password are exist!
        
        if ($row['username'] == $username && $row['pass'] == $password) {
            $userFound = true;

            $getId = mysqli_query($conn, "SELECT id FROM `moviedb` WHERE username = '$username'");
            $idResult = mysqli_fetch_assoc($getId);
            $id = intval($idResult['id']);

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['date'] = date('j/n/Y');
            $_SESSION['time'] = date('h:i a');
            $_SESSION['ip'] = getIPAddress();
            
            $_SESSION['userId'] = $id;
            $_SESSION['loggedin'] = true;

            
            fwrite($fp,"\n===== New Access! =====\n". $username. "\nIP Address: ". $_SESSION['ip']. "\nDate: ". $_SESSION['date']. "\nTime: ". $_SESSION['time']."\n=======================\n");

            // Redirect
            header("Location: home.php");
            exit;
        }
    }

    if (!$userFound) {
        $_SESSION['loggedin'] = false;
        fwrite($fp,"\n===== Wrong Access!!!! ====="."\nUsername: ". $username."\nPassword: ". $password."\nIP Address: ". $_SESSION['ip']."\nUser Agent: ". $_SERVER['HTTP_USER_AGENT']. "\nDate: ". $_SESSION['date']. "\nTime: ". $_SESSION['time']."\n============================\n");
        echo "<script>
        alert('Wrong username or password');
        window.location.href='index.php';
        </script>";
        die;
    }
    
}

?>