<?php
session_start();
include 'db_connect.php';

if (isset($_POST['signupSubmit'])) {

    $newFirstName = ucwords($_POST['newFirstName']);
    $newLastName = ucwords($_POST['newLastName']);
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];
    $newRePassword = $_POST['newRePassword'];

    if ($newPassword != $newRePassword) {
        echo "<script>
            alert('Wrong Configuration Password!');
            window.location.href='index.php';
            </script>";
        die;
    }

    $selectResult = mysqli_query($conn, "SELECT * FROM `moviedb`");
    
    while ($row = mysqli_fetch_assoc($selectResult)) {
        // Check if the username is exist!
        if ($row['username'] == $newUsername) {
            echo "<script>
            alert('Username is exist! Please choose onther one');
            window.location.href='index.php';
            </script>";
            die;
        };
    }
    
    try {///////////////////////////////////////
        $insertValues = mysqli_query($conn, "INSERT INTO moviedb(`username`, `pass` ,`fname`, `lname`) VALUES ('$newUsername', '$newPassword', '$newFirstName', '$newLastName')");
        
        $getId = mysqli_query($conn, "SELECT id FROM `moviedb` WHERE username = '$newUsername'");
        $idResult = mysqli_fetch_assoc($getId);
        $id = intval($idResult['id']);

        $_SESSION['userId'] = $id;
        $_SESSION['username'] = $newUsername;
        //////////////////////////////////////
        $_SESSION['firstName'] = $newFirstName;
        $_SESSION['lastName'] = $newLastName;

        $_SESSION['signedUp'] = true;
        
        file_put_contents("./users/$id.json", '[]'); 

        header('Location: ./home.php');

    } catch(PDOException $e) {
        $_SESSION['signedUp'] = false;
        echo $e->getMessage();
    }
}
?>