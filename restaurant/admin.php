<?php
// Start the session
session_start();

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  

date_default_timezone_set("Asia/Amman");

$fp = fopen('log.txt', 'a');//opens file in append mode  
fwrite($fp, "New Access!\n====================\n");
fwrite($fp, "IP Adderess: ". $ip. "\n". "Date: ". date('j-n-Y'). "\n". "Time: ". date('h:i A'). "\n". $_SERVER['PHP_SELF']."\n".$_SERVER['SERVER_NAME']."\n".$_SERVER['HTTP_HOST']."\n".$_SERVER['HTTP_USER_AGENT']."\n".$_SERVER['SCRIPT_NAME']."\n=====================================================\n");
fclose($fp);  




?>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/root.css">
    <script src="./jquery/jquery.js"></script>
    <script src="./jquery/jquery-ui.js"></script>
    <title>Data</title>
</head>
<body style="background-color: red;">
    
<article class="data-php">

<?php
// Read JSON file
$json = file_get_contents('./data.json');



echo "
<form action='' method='POST'>
    <textarea id='dataInput' name='dataInput' type='text'>$json</textarea><br>
    <input id='editData' name='editData' type='submit' value='Save'>
    <a id='logout' href='./logout.php'>Logout</a>

</form>
";


// //Decode JSON
// $data = json_decode($json,true);

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
    console.log("yoo");

    $(function () {
        $('#editData').hide();
        $('#dataInput').on('input',function(e){
            $('#editData').show();

        });
    });
</script>
</body>
</html>