<?php

if(!isset($conn)) die();

$username = $pathParam[0];

$sql = "DELETE FROM `user` WHERE `username` = '$username';";
$result = mysqli_query($conn, $sql);

if($result){
    http_response_code(200);
}else{
    http_response_code(404);
}
