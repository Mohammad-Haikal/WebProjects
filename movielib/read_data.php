<?php
session_start();
$id = $_SESSION['userId'];
echo file_get_contents("./users/$id.json");
?>
