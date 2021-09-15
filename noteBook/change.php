<?php

$pk = $_POST['pk'];
$title = $_POST['title'];
$note = $_POST['note'];
date_default_timezone_set("Asia/Amman");
$date = date("d/m/Y") . "<br>" . date("l") . "<br>" . date("h:ia");

include './DatabaseConnect.php';

$sql = "UPDATE note SET title = '$title',  note = '$note', note_date = '$date' WHERE id = $pk;";
// Check errors
if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
    header("Location: index2.php");

?>