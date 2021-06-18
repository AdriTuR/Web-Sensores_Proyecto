<?php

if(!isset($conn)) die();

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['DNI'];
$tipo = $_POST['cuenta'];

$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$username = $_POST['nombre_cuenta'];
$passwd = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

$address = "a";
//TODO: Faltan añadir campo Dirección en formulario dar de alta

$sql = "INSERT INTO `user` (`username`, `password`, `email`, `role`, `type`) VALUES ('$username', '$passwd', '$correo', 'USER', '$tipo');";
$result = mysqli_query($conn, $sql);

if($result){
    $sql2 = "INSERT INTO `user_info` (`userID`, `dni`, `name`, `surname`, `address`, `phone`) VALUES ((SELECT `id` FROM `user` WHERE `username` = '$username'), '$dni', '$nombre', '$apellidos', '$address', '$telefono');";
    $result2 = mysqli_query($conn, $sql2);
    
    if($result2){
        //TODO: Enviar correo al usuario con los datos de acceso.
        http_response_code(200);
    }else{
        http_response_code(404);
    }
}else{
    http_response_code(404);
}

