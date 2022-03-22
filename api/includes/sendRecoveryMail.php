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

            $body = utf8_decode(file_get_contents("../../includes/mail_templates/mail.html"));
            $body = str_replace("%nombre%", "Jose Juan", $body); 
            $body = str_replace("%recoverLink%", "http://kbaczek.upv.edu.es/recover.php?token=". $token, $body); 

            $template = [];
            $template["title"] = 'GTI Sensores - Cambio de contraseña';
            $template["body"] = $body;
            sendMail($email, $template);

            $res["status"] = "ok";
            echo(json_encode($res));
        }
    }else{
        http_response_code(401);
        die();  
    }  
}