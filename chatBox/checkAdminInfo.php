<html>
<body>

<?php

$user = $_POST["username"];
$pass = $_POST["password"];

if($user == "muhhl" && $pass == "muhhl"){
    header("Location: database.php");
}else{
    header("Location: adminLogin.php");
}





?>

</body>
</html>