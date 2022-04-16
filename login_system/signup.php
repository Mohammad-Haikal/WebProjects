<?php
session_start();
include 'db_connect.php';

if (isset($_POST['signupSubmit'])) {
    $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];
    $newRePassword = $_POST['newRePassword'];

    if ($newPassword != $newRePassword) {
        echo "<script>
            alert('Wrong Configuration Password!');
            window.location.href='signup_form.php';
            </script>";
        die;
    }

    $selectResult = mysqli_query($conn, "SELECT * FROM `users`");
    
    try {
        $insertValues = mysqli_query($conn, "INSERT INTO users(`email`, `password`) VALUES ('$newEmail', '$newPassword')");

        echo "<script>
            alert('User Created Successfully!');
            window.location.href='home.php';
            </script>";
        die;

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>