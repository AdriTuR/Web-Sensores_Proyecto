<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    require 'connection.php';
    
    $email = $_POST['introducir_correo'];
    
    $sql = "SELECT * FROM `user` WHERE `email` = '$email';";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        
        $genPas = randomPassword();
        $newPass = password_hash($genPas, PASSWORD_DEFAULT);
        
        $sql2 = "UPDATE `user` SET `password` = '$newPass' WHERE `email` = '$email';";
        $done = mysqli_query($conn, $sql2);
        
        if($done){
            require_once('mail/class.smtp.php');
            require_once('mail/class.phpmailer.php');
            
            $mail = new PHPMailer();
            $mail->CharSet = 'utf-8';
            
            try {
                $mail->SMTPDebug = 1;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = '9studios.gti@gmail.com';
                $mail->Password = 'Responsive9';
                $mail->SMTPSecure = 'ENCRYPTION_STARTTLS';
                $mail->Port = 25; 
                
                $mail->setFrom('9studios.gti@gmail.com', 'GTI Sensores');
                $mail->addAddress($email, 'Joe User');
                $mail->isHTML(true); 
                
                $mail->Subject = 'EMAIL DE ENVIO DE CONTRASEÑA';
                $mail->Body = '<h1>GTI SENSORES</h1> <br> <b>Se ha cambiado la contraseña, ahora es: <span>' . $genPas . '</span>';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                $mail->send();
                echo("ok");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
            http_response_code(401);
            die(); 
        }
    }else{
        http_response_code(401);
        die();  
    }  
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    
    return implode($pass);
}