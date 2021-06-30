<?php

if(!isset($conn)) die();

$nombre = $_POST['introducir_nombre'];
$apellidos = $_POST['introducir_apellidos'];
$dni = $_POST['introducir_DNI'];
$tipo = $_POST['cuenta'];

$telefono = $_POST['introducir_telefono'];
$correo = $_POST['introducir_correo'];
$username = $_POST['introducir_cuenta'];
$passwd = password_hash($_POST['introducir_contraseña'], PASSWORD_DEFAULT);

//$address = $_POST['direccion'];

$sql = "INSERT INTO `user` (`username`, `password`, `email`, `role`, `type`) VALUES ('$username', '$passwd', '$correo', 'USER', '$tipo');";
$result = mysqli_query($conn, $sql);

if($result){
    $sql2 = "INSERT INTO `user_info` (`userID`, `dni`, `name`, `surname`, `address`, `phone`) VALUES ((SELECT `id` FROM `user` WHERE `username` = '$username'), '$dni', '$nombre', '$apellidos', '$address', '$telefono');";
    $result2 = mysqli_query($conn, $sql2);
    
    if($result2){
        //TODO: Enviar correo al usuario con los datos de acceso.
        http_response_code(200);
    }else{
        http_response_code(401);
    }
}else{
    http_response_code(401);
}

