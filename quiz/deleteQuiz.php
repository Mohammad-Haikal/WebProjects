<?php
if (isset($_GET['token'])) {

    $token = $_GET['token'];
	$file = "./tokens/$token.json";
    include 'connectDB.php';

    $query1 = mysqli_query($conn, "DELETE FROM `data` WHERE token = '$token'");
    if ($conn->query($query1) !== TRUE) {
        echo $conn->error;
    } 

    $query2 = mysqli_query($conn, "DELETE FROM `peers` WHERE token = '$token'");
    if ($conn->query($query2) !== TRUE) {
        echo $conn->error;
    } 
    

	if(file_exists($file)) {
		unlink($file);
	} else {
   		header("HTTP/1.1 500 Internal Server Error");
	}
}

header("location: ./myQuizzes.php")

?>