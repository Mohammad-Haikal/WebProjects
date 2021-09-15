<?php
    include './DatabaseConnect.php';

    $sql = "SELECT * FROM note order by id";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $data = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

    } else {
        echo "";
    }

    mysqli_close($conn);
    echo json_encode($data);

?>