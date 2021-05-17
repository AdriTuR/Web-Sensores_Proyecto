<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){

    require_once 'connection.php';

    $email = $_POST['mail'];

    $sql = "SELECT * FROM `user` WHERE `email` = '$email';";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $userID = $row["id"];
        $token = bin2hex(openssl_random_pseudo_bytes(64));

        $sql = "DELETE FROM `user_recovery` WHERE `userID` = '$userID';";
        mysqli_query($conn, $sql);

        date_default_timezone_set('Europe/Madrid');
        $actualdate = date('Y-m-d H:i:s');

        $expiration = date( "Y-m-d H:i:s", strtotime( $actualdate ) + 12 * 3600 );
        $sql = "INSERT INTO `user_recovery` VALUES ('$userID','$token','$expiration');";
        $done = mysqli_query($conn, $sql);
        $res = [];
        
        if($done){	
            require_once 'mail.php';
            $template = [];
            $template["title"] = 'GTI Sensores - Cambio de contraseña';
            $template["body"] = '<h1>GTI SENSORES</h1> <br> <b>Se ha solicitado un cambio de contraseña para su cuenta en nuestra web. Para cambiarla sigue el siguiente enlace.<br> <span>' . '<a href="http://localhost/recover.php?token='. $token . '"><button>Click</button></a></span>';
            sendMail($email, $template);

            $res["status"] = "ok";
            echo(json_encode($res));
        }
    }else{
        http_response_code(401);
        die();  
    }  
}