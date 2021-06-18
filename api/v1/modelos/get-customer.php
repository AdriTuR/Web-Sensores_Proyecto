<?php

if(!isset($conn)) die();

if(!empty($pathParam[0])){
    $sql = "SELECT * FROM user WHERE username = '$pathParam[0]';";
}else{
    $sql = "SELECT * FROM user;";
}

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)) {
        $id = $row["id"];
        $sql2 = "SELECT user_info.registerDate, user.email, user_info.address, user_info.phone, user.type, user.username, user.role, user_info.name, user_info.surname, user_info.dni FROM user_info, user WHERE user.id = '$id' AND user.id = user_info.userID";
        $result2 = mysqli_query($conn, $sql2);
        
        if(mysqli_num_rows($result2) > 0){
            $userInfoRow = mysqli_fetch_array($result2);
            
            $userData["username"] = $userInfoRow["username"];
            $userData["dni"] = $userInfoRow["dni"];
            $userData["name"] = utf8_encode($userInfoRow["name"]);
            $userData["surname"] = utf8_encode($userInfoRow["surname"]);
            $userData["role"] = utf8_encode($userInfoRow["role"]);
            $userData["type"] = $userInfoRow["type"];
            $userData["address"] = utf8_encode($userInfoRow["address"]);
            $userData["phone"] = $userInfoRow["phone"];
            $userData["registerDate"] = $userInfoRow["registerDate"];
            $userData["email"] = $userInfoRow["email"];
            
            $username = $userInfoRow["username"];

            $sql3 = "SELECT COUNT(probe.id) AS qty FROM probe, user, field, plot WHERE user.username = '$username' AND user.username = field.owner AND plot.fieldID = field.id AND probe.plotID = plot.id";
            $result3 = mysqli_query($conn, $sql3);

            if(mysqli_num_rows($result3) > 0){
                $row = mysqli_fetch_assoc($result3);
                $userData["qtyProbes"] = $row["qty"];
            }

            array_push($data, $userData);
        }
    }
}