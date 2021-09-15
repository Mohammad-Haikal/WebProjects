<?php
    // DB Connect
    include './DatabaseConnect.php';

    // Store Data
    if (isset($_POST['storeBtn'])) {
        $title = $_POST['title'];
        $note = $_POST['note'];
        date_default_timezone_set("Asia/Amman");
        $date = date("d/m/Y") . "<br>" . date("l") . "<br>" . date("h:ia");
    
        // Insert
        $sql2 = "INSERT INTO note (`title`, `note`, `note_date`) VALUES ('$title', '$note', '$date')";
    
        // Check errors
        if ($conn->query($sql2) === FALSE) {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    
        $conn->close();
        header("Location: index2.php");
    };
    
    // Change Data
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $note = $_POST['note'];

        
        date_default_timezone_set("Asia/Amman");
        $date = date("d/m/Y") . "<br>" . date("l") . "<br>" . date("h:ia");

        $sql = "UPDATE note SET title = '$title',  note = '$note', note_date = '$date' WHERE id = $id;";
        // Check errors
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
            
        $conn->close();
        // header("Location: index2.php");
        echo "title: ". $title. "<br>";
        echo "note: ". $note. "<br>";
    };

    // Delete Data
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "delete FROM `note` WHERE id = $id;";
    
        // Check errors
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    };




?>