<?php

if(!isset($conn)) die();

$plotID = $_POST['plotID'];
$location= $_POST['location'];


$sql = "INSERT INTO `probe` (`plotID`, `location`) VALUES ('$plotID', '$location');";
$result = mysqli_query($conn, $sql);

if($result){
    http_response_code(200);
}else{
    http_response_code(401);
}


