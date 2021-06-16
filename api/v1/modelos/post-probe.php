<?php

if(!isset($conn)) die();

$plotID = $_POST['plotID'];

$sql = "SELECT * FROM `probe` WHERE `plotID` = '$plotID';";
$result = mysqli_query($conn, $sql);

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
  
  $data = $result->fetch_all(MYSQLI_ASSOC);
}