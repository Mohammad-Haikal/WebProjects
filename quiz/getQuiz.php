<?php
session_start();
$token = $_SESSION['token'];
if(file_exists("./tokens/$token.json")) {
    $filedata = file_get_contents("./tokens/$token.json");
    print_r($filedata);

} else {
    header("HTTP/1.1 500 Internal Server Error");
}

?>