<?php
session_start();
include 'connectDB.php';

$token = $_SESSION['token'];
$peername = $_COOKIE["peername"];
$score = intval($_COOKIE["score"]);

var_dump($token);
var_dump($peername);
var_dump("INSERT INTO peers(token, peername, score) VALUES ('$token', '$peername', $score)");
$query =  mysqli_query($conn, "INSERT INTO peers(token, peername, score) VALUES ('$token', '$peername', $score)");

header("location: ./showScores.php?token=$token")
?>