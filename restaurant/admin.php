<?php

if (isset($_POST['editData'])) {
    $newdata =  $_POST['dataInput'];
    $filename = 'data.json';

    // header("Content-Type: application/octet-stream");
    // header("Content-Transfer-Encoding: Binary");
    // header("Content-disposition: attachment; filename=\"".$filename."\"");
    file_put_contents('data.json', $newdata);
    header("Refresh:0");

}

?>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/root.css">
    <script src="./jquery/jquery.js"></script>
    <script src="./jquery/jquery-ui.js"></script>
    <title>Data</title>
</head>
<body>
    
<article class="data-php">

<?php
// Read JSON file
$json = file_get_contents('./data.json');

//Decode JSON
// $data = json_decode($json,true);

echo "
<form action='' method='POST'>
    <textarea id='dataInput' name='dataInput' type='text'>$json</textarea><br>
    <input id='editData' name='editData' type='submit' value='Save'>
    <a id='logout' href='./index.html'>Logout</a>

</form>


";




// //Print data
// for ($i=0; $i < count($data); $i++) { 
//     echo "<form action=''>";
//     echo "<div>";

//     echo "<strong style='color:red;'>Data_id: </strong>";
//     echo"<input type='text' value='". $data[$i]['id']."'><br>";

//     echo "<strong style='color:green;'>Data_name: </strong>". $data[$i]['name']. '<br><hr>';
//     for ($j=0; $j < count($data[$i]['info']); $j++) { 
//         echo "<strong style='color:red;'>Id: </strong>". $data[$i]['info'][$j]['id']. '<br>';
//         // echo "<strong style='color:red;'>Id: </strong>". $data[$i]['info'][$j]['id']. '<br>';
        
//         echo "<strong style='color:green;'>Title: </strong>". $data[$i]['info'][$j]['title']. '<br>';
//         echo "<strong style='color:green;'>Paragraph: </strong>". $data[$i]['info'][$j]['para']. '<br>';
//         echo "<strong style='color:green;'>Price: </strong>". $data[$i]['info'][$j]['price']. '<br>';
//         echo "<strong style='color:green;'>Image_Location: </strong>". $data[$i]['info'][$j]['path']. '<br><br>';
//     }

//     echo "</div>";
//     echo"</form>";

// }

?>


</article>


<script>
    console.log();

    $(function () {
        $('#editData').hide();
        $('#dataInput').on('input',function(e){
            $('#editData').show();

        });

        // $('#editData').on('submit',function(e){

        //     let newData = $('#dataInput').html();

        //     $.post("readData.php", $form.serialize(),
        //         function (data, textStatus, jqXHR) {
                    
        //         },
                
        //     );

        // });

    });
</script>
</body>
</html>