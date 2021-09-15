<?php

$title = $_POST['title'];
$note = $_POST['note'];
date_default_timezone_set("Asia/Amman");
$date = date("d/m/Y") . "<br>" . date("l") . "<br>" . date("h:ia");

include './DatabaseConnect.php';

// Insert
$sql2 = "INSERT INTO note (`title`, `note`, `note_date`) VALUES ('$title', '$note', '$date')";


// Check errors
if ($conn->query($sql2) === FALSE) {
echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();

header("Location: index2.php");
?>