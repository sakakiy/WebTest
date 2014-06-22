<?php

$url = "http://www.google.com";
$http = file_get_contents($url);
$file = fopen("result", "w");
$mesage = "RESULT : " + fwrite($file, $http);
echo $message;
?>