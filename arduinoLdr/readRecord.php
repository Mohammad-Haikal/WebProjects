<?php

$file = "record.txt";
$data = file($file);
$line = $data[count($data)-1];

// echo file_get_contents("record.txt");
echo $line;




?>