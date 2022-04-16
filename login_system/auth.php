<?php
session_start();
include 'db_connect.php';
if (isset($_POST['loginSubmit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectResult = mysqli_query($conn, "SELECT * FROM `users`");
    
    while ($row = mysqli_fetch_assoc($selectResult)) {
        // Check if the email and password are exist!
        
        if ($row['email'] == $email && $row['password'] == $password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;

            // Redirect
            header("Location: home.php");
            exit;
        }
    }

    $_SESSION['loggedin'] = false;
    echo "<script>
    alert('Wrong email or password');
    window.location.href='index.php';
    </script>";
    exit;    
}

?>