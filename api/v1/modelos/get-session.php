<?php

if(!isset($conn)) die();

session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] !== ''){
    $data = $_SESSION;
}else{
    http_response_code(401);
    exit();
}