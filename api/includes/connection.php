<?php

//-----------------------------CONEXIÓN MYSLQL------------------------------//
$db_server = 'sql11.freesqldatabase.com';
$db_user = 'sql11407928';
$db_password = 'm9v239sv1m';
$db_name = 'sql11407928';

$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Error while connecting with database: " . mysqli_connect_error());
}
//-------------------------------------------------------------------------//
