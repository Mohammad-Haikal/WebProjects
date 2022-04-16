<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "muhammad_haikal_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['button'])) {
    $sql = "DELETE from `person`";
    $conn->query($sql);
    echo 'Data have been deleted!';
  }


$conn->close();


header("Refresh: 2; url=database.php");

?>