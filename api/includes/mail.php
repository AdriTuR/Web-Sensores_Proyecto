<?php

function sendMail($email, $template){
    require_once 'mail/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    
    try {
        $mail->CharSet = 'utf-8';
        
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ttls";
        $mail->Port = 587; 
        
        $mail->Username = '9studios.gti@gmail.com';
        $mail->Password = 'Responsive9';
        
        $mail->setFrom('9studios.gti@gmail.com', 'GTI Sensores');
        $mail->addAddress($email, 'Joe User');
        $mail->isHTML(true); 
        
        $mail->Subject = $template["title"];
        $mail->Body = $template["body"];
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
    } catch (Exception $e) {
        /*
        $res["status"] = "fail";
        $res["error"] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo(json_encode($res));
        */
    }
}