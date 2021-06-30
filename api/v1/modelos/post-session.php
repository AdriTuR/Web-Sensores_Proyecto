<?php

if(!isset($conn)) die();

$name = trim($_POST['username']);
$passwd = trim($_POST['passwd']);

$sql = "SELECT * FROM `user` WHERE `username` = '$name';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if(!password_verify($passwd, $row["password"])){
        $data["error"] = "Contraseña incorrecta";
        http_response_code(401);
        return;
    } 

    session_start();

    $data["name"] = $row["username"];
    $data["role"] = $row["role"];
    $data["lastLogin"] = $row["lastLogin"];
    $data["end"] = "ok";

    $_SESSION["name"] = $row["username"];
    $_SESSION["role"] = $row["role"];
    $_SESSION["email"] = $row["email"];
    
}else{
    $data["error"] = "Usuario no existente";
    http_response_code(401);
}  