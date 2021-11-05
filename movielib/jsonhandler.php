<?php

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

?>