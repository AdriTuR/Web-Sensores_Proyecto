<?php

if(!isset($conn)) die();

$fieldID = $_POST['fieldID'];
$location= $_POST['location'];
//$m2 = $_POST['mail'];


$sql = "INSERT INTO `plot` (`fieldID`, `location`) VALUES ('$fieldID', '$location');";
$result = mysqli_query($conn, $sql);

if($result){
    http_response_code(200);
}else{
    http_response_code(404);
}

