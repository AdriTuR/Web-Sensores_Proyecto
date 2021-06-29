<?php

$fecha = date("Y/m/d");
$fecha2 = str_replace("/","-", $fecha);

$sqlCustomers = "SELECT * FROM user;";
$resultCustomers = mysqli_query($conn, $sqlCustomers);

$sqlComp = "SELECT * FROM user WHERE type ='COMPANY'";
$resultCompanies = mysqli_query($conn, $sqlComp); 

$sqlInquiries = "SELECT * FROM inquiries";
$resultInquiries = mysqli_query($conn, $sqlInquiries);

$sqlProbes = "SELECT * FROM probe";
$resultProbes = mysqli_query($conn, $sqlProbes);

$todayInquiries = 0;

//INQUIRIES 
if(mysqli_num_rows($resultInquiries) > 0){
    while ($row = mysqli_fetch_assoc($resultInquiries)){
        $date = $row['date'];
        $date2 = "";
        for($var = 0; $var<10; $var++){
            $date2 .= $date[$var];
        }
        if($date2 == $fecha2){
            $todayInquiries += 1;
        }
    } 
}

$data["nCustomers"] = mysqli_num_rows($resultCustomers);
$data["nCompanies"] = mysqli_num_rows($resultCompanies);
$data["totalSensors"] = mysqli_num_rows($resultProbes);
$data["todayInquiries"] = $todayInquiries;
