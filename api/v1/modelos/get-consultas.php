<?php

$method = $_SERVER['REQUEST_METHOD'];

require_once 'connection.php';


     $sql = "SELECT * FROM `inquiries`";

     $result = mysqli_query($conn, $sql);
if(empty($result)){

    $http_code = 402;

}else{

    $http_code = 200;

    while($fila = mysqli_fetch_assoc($result)){
        $inquiries = array(
            "name" => $fila['name'],
            "surname" => $fila['surname'],
            "message" => $fila['message'],
            "date" => $fila['date']
        );

        array_push($salida, $inquiries);

    }

}


