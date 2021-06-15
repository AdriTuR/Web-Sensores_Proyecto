<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST'){

    require_once '../includes/connection.php';

	$owner = trim($_POST['user']);
    $data = trim($_POST['data']);

    if(isset($_POST['extra'])){
        $extra = trim($_POST['extra']);
    }
    
    switch($data){
        case "field":
            $finalData = getFieldData($owner);
            break;
        case "plot":  
            $finalData = getPlotData($extra);
            break;
        case "probe":  
            $finalData = getProbeData($extra);
            break;    
    }

    if($finalData != null && !empty($finalData)){
        encodeData($finalData);
    }else{
        http_response_code(401);
        die();
    }  
}

function getFieldData($owner){
    $sql = "SELECT `id`, `location`, `m2` FROM `field` WHERE `owner` = '$owner';";
    $result = mysqli_query($GLOBALS["conn"], $sql);

    $fieldData = array();
    
    class Field {
        public $fieldID;
        public $m2; 
        public $location; 
        
        function __construct($a, $b, $c) {
          $this->fieldID = $a;
          $this->m2 = $b;
          $this->location = $c;
        }
      }

    if(!empty($result) && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $field = new Field($row["id"], $row["m2"], $row["location"]);
            array_push($fieldData, $field);
        }
    }

    return $fieldData;
}

function getPlotData($fieldID){
    $sql = "SELECT `id`, `location`, `m2`, `qty_probes`  FROM `plot` WHERE `fieldID` = '$fieldID';";
    $result = mysqli_query($GLOBALS["conn"], $sql);

    $plotData = array();

    if(mysqli_num_rows($result) > 0){        
        class Plot {
            public $plotID;
            public $qty_probes; 
            public $m2; 
            public $location; 
            
            function __construct($a, $b, $c, $d) {
              $this->plotID = $a;
              $this->m2 = $b;
              $this->qty_probes = $c;
              $this->location = $d;
            }
          }

        while($row = mysqli_fetch_array($result)) {
            $plot = new Plot($row["id"], $row["m2"], $row["qty_probes"], $row["location"]);
            array_push($plotData, $plot);
        }
    }

    return $plotData;
}

function getProbeData($plotID){
    $sql = "SELECT * FROM `probe` WHERE `plotID` = '$plotID';";
    $result = mysqli_query($GLOBALS["conn"], $sql);

    $probeData = array();

    if(mysqli_num_rows($result) > 0){        
        class Probe {
            public $id;
            public $location;
            public $humidity; 
            public $temperature; 
            public $salinity; 
            public $luminity; 
            public $lastUpdate; 
            
            function __construct($z, $a, $b, $c, $d, $e, $f) {
              $this->id = $z;
              $this->location = $a;
              $this->humidity = $b;
              $this->temperature = $c;
              $this->salinity = $d;
              $this->luminity = $e;
              $this->lastUpdate = $f;
            }
          }

        while($row = mysqli_fetch_array($result)) {
            $probe = new Probe($row["id"], $row["location"], $row["humidity"], $row["temperature"], $row["salinity"], $row["luminity"], $row["lastUpdate"]);
            array_push($probeData, $probe);
        }
    }

    return $probeData;
}

function encodeData($data){
    header('Content-Type: application/json');
    echo json_encode($data);
}