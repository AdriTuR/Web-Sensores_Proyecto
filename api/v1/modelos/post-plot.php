<?php

if(!isset($conn)) die();

$fieldID = $_POST['fieldID'];

$sql = "SELECT `id`, `location`, `m2`, `qty_probes`  FROM `plot` WHERE `fieldID` = '$fieldID';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){     
  /*   
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
*/
  //RETURNS ALL FIELDS -- TODO
  $data = $result->fetch_all(MYSQLI_ASSOC);
}