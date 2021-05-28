<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST'){

    require_once '../includes/connection.php';

    $probeID = trim($_POST['probeID']);

    $sql = "SELECT *  FROM `probe_history` WHERE `probeID` = '$probeID';";
    $result = mysqli_query($conn, $sql);

    $plotData = array();

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        class Plot {
            public $h;
            public $t; 
            public $s; 
            public $date; 
            
            function __construct($a, $b, $c, $d) {
              $this->h = $a;
              $this->t = $b;
              $this->s = $c;
              $this->date = $d;
            }
          }

          $plot = new Plot($row["humidity"], $row["temperature"], $row["salinity"], $row["date"]);
   
          echo json_encode($plot);         
}
}