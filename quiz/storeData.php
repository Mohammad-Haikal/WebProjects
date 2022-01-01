<?php
session_start();
$token = $_COOKIE["token"];
$_SESSION["link"] = "http://localhost/quiz/start.php?token=$token";

$quizFile = fopen("$token.json", "w") or die("Unable to reach the quiz!");
fwrite($quizFile, $_COOKIE["data"]);
fclose($quizFile);



header("location: ./finish.php")

?>