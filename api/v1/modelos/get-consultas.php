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
            "name" => $row['name'],
            "surname" => $row['surname'],
            "message" => $row['message'],
            "date" => $row['date']
        );

        array_push($data, $inquiries);
    }
}