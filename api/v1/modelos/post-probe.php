<?php

if(!isset($conn)) die();

$plotID = $_POST['plotID'];
$location= $_POST['location'];
//$m2 = $_POST['mail'];


$sql = "INSERT INTO `probe` (`plotID`, `location`, `humidty`, `temperature`, `salinity`, `luminity`) VALUES ('$plotID', '$location', 'rand(1, 100);', 'rand(-5, 40);', 'rand(0, 100);', '0');";
$result = mysqli_query($conn, $sql);

if($result){
    http_response_code(200);
}else{
    http_response_code(404);
}


