<?php

if(!isset($conn)) die();

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['mail'];
$message = $_POST['respuesta'];
$type = $_POST['type'];


$sql = "INSERT INTO `inquiries` (`name`, `surname`, `email`, `message`, `type`) VALUES ('$name', '$surname', '$email', '$message', '$type');";
$result = mysqli_query($conn, $sql);

if($result){
    http_response_code(200);
}else{
    http_response_code(404);
}

