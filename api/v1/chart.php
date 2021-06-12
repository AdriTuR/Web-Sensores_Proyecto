<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET'){
  
  require_once '../includes/connection.php';
  
  $probeID = trim($_GET['probeID']);
  $probeID = 1;

  $sql = "SELECT *  FROM `probe_history` WHERE `probeID` = '$probeID' ORDER by date;";
  
  $dateArray = array();
  if(isset($_GET['date'])){
    $date = trim($_GET['date']);
    $sql = "SELECT * FROM `probe_history` WHERE `probeID` = '$probeID' AND `date` = '$date';";

  }else {
    $sql2 = "SELECT date FROM `probe_history` WHERE `probeID` = '$probeID'";
    $result = mysqli_query($conn, $sql2);
    
    if(!empty($result) && mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)) {
        array_push($dateArray, $row['date']);
      }
    }
  }
  
  $result = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    
    class Data {
      public $h;
      public $t; 
      public $s; 
      public $date; 
      public $allDates;
      
      function __construct($a, $b, $c, $d, $e) {
        $this->h = $a;
        $this->t = $b;
        $this->s = $c;
        $this->date = $d;
        $this->allDates = $e;
      }
    }
    
    $data = new Data($row["humidity"], $row["temperature"], $row["salinity"], $row["date"], $dateArray);
    echo json_encode($data);
  }
}