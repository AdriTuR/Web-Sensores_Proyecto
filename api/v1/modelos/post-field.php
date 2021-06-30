<?php

if(!isset($conn)) die();

$owner = $_POST['owner'];
$location= $_POST['location'];
//$m2 = $_POST['mail'];


$sql = "INSERT INTO `field` (`owner`, `location`) VALUES ('$owner', '$location');";
$result = mysqli_query($conn, $sql);

if($result){
    http_response_code(200);
}else{
    http_response_code(404);
}

