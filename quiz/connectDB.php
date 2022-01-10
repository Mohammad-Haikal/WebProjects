<?php
$servername = "sql209.epizy.com:3306";
$username = "epiz_30721638";
$password = "BD6ifO4QiG3j";
$dbname = "epiz_30721638_XXX";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>