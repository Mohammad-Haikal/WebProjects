<?php

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://muhhaikal.ml/movielib/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($curl);

curl_close($curl);


echo $response;


?>
