<?php
session_start();
include 'connectDB.php';

$token = $_COOKIE["token"];
$username = $_COOKIE["username"];
$mark = intval($_COOKIE["mark"]);

$quizFile = fopen("./tokens/$token.json", "w") or die("Unable to reach the quiz!");
fwrite($quizFile, $_COOKIE["data"]);
fclose($quizFile);

$query =  mysqli_query($conn, "INSERT INTO data(token, creator, mark) VALUES ('$token', '$username', $mark)");

header("location: ./finish.php");
?>