<?php
include './DatabaseConnect.php';

if(isset($_POST["saveBgColor"])){

    $color = $_POST["bgColor"];

    $conn->query("DELETE FROM `color`");
    
    $sql = "INSERT INTO color (`color`) VALUES ('$color')";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: index2.php");
}
?>