<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST'){

    require 'connection.php';

    if(strlen($_POST['introducir_nombre']) >= 1 && strlen($_POST['introducir_correo']) >= 1 && strlen($_POST['introducir_mensaje']) >= 1){
        $nombre = trim($_POST['introducir_nombre']);
        $apellidos = trim($_POST['introducir_apellidos']);
        $correo = trim($_POST['introducir_correo']);
        $mensaje = trim($_POST['introducir_mensaje']);

        $consulta = "INSERT INTO `inquiries` (name, surname, email, message) VALUES ('" . $nombre . "', '" . $apellidos . "', '" . $correo . "', '" . $mensaje . "');";
        $resultado = mysqli_query($conn, $consulta);

        if($resultado){
            http_response_code(200);
            exit();
        }else{
            http_response_code(400);
            die();
        }
    }
}

