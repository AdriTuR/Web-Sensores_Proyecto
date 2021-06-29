<?php

if(!isset($conn)) die();

$sql = "SELECT * FROM `inquiries`";
$result = mysqli_query($conn, $sql);

if(empty($result)){
    http_response_code(404);
    exit();
}else{
    while($row = mysqli_fetch_assoc($result)){
        $inquiries = array(
            "name" => utf8_encode($row['name']),
            "surname" => utf8_encode($row['surname']),
            "message" => utf8_encode($row['message']),
            "mail" => utf8_encode($row['email']),
            "date" => $row['date']
        );

        array_push($data, $inquiries);
    }
}