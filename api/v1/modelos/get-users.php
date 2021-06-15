<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET'){

    require '../includes/connection.php';
 
    $sql = "SELECT * FROM user;";
    $result = mysqli_query($conn, $sql);

    $usersList = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $id = $row["id"];
            $sql2 = "SELECT user_info.name, user_info.surname, user_info.dni FROM user_info, user WHERE user.id = '$id' AND user.id = user_info.userID";
            $result2 = mysqli_query($conn, $sql2);

            if(mysqli_num_rows($result2) > 0){
                $userInfoRow = mysqli_fetch_array($result2);

                $userData = [];
                $userData["dni"] = $userInfoRow["dni"];
                $userData["name"] = utf8_encode($userInfoRow["name"]);
                $userData["surname"] = utf8_encode($userInfoRow["surname"]);

                array_push($usersList, $userData);
            }
        }
    }

    header('Content-Type: application/json');  
    echo json_encode($usersList);
}