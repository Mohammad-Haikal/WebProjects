<?php

$pk = $_POST['pk'];

include './DatabaseConnect.php';

$sql = "delete FROM `note` WHERE id = $pk;";
// Check errors
if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
    header("Location: index2.php");

?>