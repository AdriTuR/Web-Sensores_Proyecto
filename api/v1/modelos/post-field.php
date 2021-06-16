<?php

if(!isset($conn)) die();

$owner = trim($_POST['user']);

$sql = "SELECT `id`, `location`, `m2` FROM `field` WHERE `owner` = '$owner';";
$result = mysqli_query($conn, $sql);

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
        array_push($data, $field);
    }
}