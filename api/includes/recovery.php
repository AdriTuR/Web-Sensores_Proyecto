<?php

$method = $_SERVER['REQUEST_METHOD'];

require_once 'connection.php';

if($method == 'GET' && isset($_GET['token'])){

    $token = $_GET['token'];

    $sql = "SELECT * FROM `user_recovery` WHERE `token` = '$token';";
    $result = mysqli_query($conn, $sql);

    $data = [];
    $userID;
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        date_default_timezone_set('Europe/Madrid');
        $actualdate = date('Y-m-d H:i:s');

        $userID = $row["userID"];
        if($row["expiration_time"] > $actualdate){
           $data["status"] = "ok";
           $data["id"] = $userID;
        }else{
            $data["status"] = "expired";
            $sql = "DELETE FROM `user_recovery` WHERE `userID` = '$userID';";
            mysqli_query($conn, $sql);
        }

        echo(json_encode($data));

    }else{
        http_response_code(401);
        die();
    }
}
    

if($method == 'POST'){
    $id = $_POST['id'];
    $newPass = password_hash($_POST['passwd'], PASSWORD_DEFAULT);

    $sql = "UPDATE `user` SET `password` = '$newPass' WHERE `id` = '$id';";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM `user_recovery` WHERE `userID` = '$id';";
    mysqli_query($conn, $sql);

    $data['status'] = "ok";
    echo(json_encode($data));
}