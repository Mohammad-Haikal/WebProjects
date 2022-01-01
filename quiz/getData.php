<?php

session_start();
$token = $_SESSION['token'];

$filedata = file_get_contents("$token.json");
print_r($filedata);

?>