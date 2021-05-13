<?php

//-----------------------------CONEXIÓN MYSLQL------------------------------//
$db_server = 'localhost';
$db_user = 'root';
$db_password = '8SBjBWjUfAvgYGAz';
$db_name = 'web';

$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Error while connecting with database: " . mysqli_connect_error());
}
//-------------------------------------------------------------------------//
