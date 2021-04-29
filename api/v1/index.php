<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST'){

    require '../includes/connection.php';

	$name = trim($_POST['username']);
    $passwd = trim($_POST['passwd']);

    $sql = "SELECT * FROM `user` WHERE `username` = '$name';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if(!password_verify($passwd, $row["password"])) error(1);

        session_start();

        $data = [];
        $data["name"] = $row["username"];
        $data["role"] = $row["role"];
        $data["lastLogin"] = $row["lastLogin"];
        $data["end"] = "ok";

        $_SESSION["name"] = $row["username"];
        $_SESSION["role"] = $row["role"];
        encodeData($data);
    }else{
        error(2);
    }  
}

if ($method === 'GET'){
    session_start();
    if(isset($_SESSION['role']) && $_SESSION['role'] !== ''){
        encodeData($_SESSION);
    }else{
        error(0);
    }
}

function error($id){
    if($id > 0){
        $data = [];
        if($id == '1'){
            $data["error"] = "Contraseña incorrecta";
        }else if ($id == '2'){
            $data["error"] = "Usuario no existente";
        }
        encodeData($data);
    }
    
    http_response_code(401);
    die();
}

function encodeData($data){
    header('Content-Type: application/json');
    echo json_encode($data);
}