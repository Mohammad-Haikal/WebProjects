<?php
session_start();
$id = $_SESSION['userId'];
include 'db_connect.php';

// Add To Fav
if (isset($_GET['addedToFav'])) {
    $userId = $_GET['userId'];
    $movieObject = json_decode($_GET['ready']);

    $jsonFile = file_get_contents("./users/$userId.json");

    $tempArray = json_decode($jsonFile);

    array_push($tempArray, $movieObject);

    $jsonData = json_encode($tempArray);

    file_put_contents("./users/$userId.json", $jsonData); 
}

// Remove From Fav
if (isset($_GET['removedFromFav'])) {
    $userId = $_GET['userId'];
    $movieObject = json_decode($_GET['ready']);

    $jsonFile = file_get_contents("./users/$userId.json");
    
    $tempArray = json_decode($jsonFile);

    for ($i=0;$i < count($tempArray);$i++) {
        if ($movieObject  == $tempArray[$i]) {
            unset($tempArray[$i]);
            echo "Done <br>";
            $tempArray = array_values($tempArray);
        }
    }

    $jsonData = json_encode($tempArray);
    file_put_contents("./users/$userId.json", $jsonData); 
}

// Update Name
if (isset($_POST['updateName'])) {
    $changeFname = $_POST['changeFname'];
    $changeLname = $_POST['changeLname'];
    $_SESSION['firstName'] = ucwords($changeFname);
    $_SESSION['lastName'] = ucwords($changeLname);

    $query =  mysqli_query($conn, "UPDATE `moviedb` SET `fname` = '$changeFname', `lname` = '$changeLname' WHERE `moviedb`.`id` = $id");

    echo "<script>
        alert('Your Name has been changed!');
        window.location.href='home.php';
        </script>";
    exit;
}
// Update Password
if (isset($_POST['updatePassword'])) {
    $changePassword = $_POST['changePassword'];
    $changeRePassword = $_POST['changeRePassword'];
    if ($changePassword == $changeRePassword) {
        $query =  mysqli_query($conn, "UPDATE `moviedb` SET `pass` = '$changePassword' WHERE `moviedb`.`id` = $id");
        echo "<script>
        alert('Your password has been changed!');
        window.location.href='home.php';
        </script>";

    }else {
        echo "<script>
        alert('You entered a different password');
        window.location.href='home.php';
        </script>";
        die;
    }
    exit;

}

?>