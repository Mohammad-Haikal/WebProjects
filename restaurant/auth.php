<?php
session_start();

if (isset($_POST['logInSubmit'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "abcd1234") {
        // Logged in!
        $_SESSION['loggedin'] = TRUE;
        header('Location: ./admin.php');
    } 
    else {
        echo "
        <script>
        alert('Incorrect username and/or password!')
        </script>";
        header('refresh:0.1;url=login.php');
    }
}
