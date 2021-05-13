<?php
$t = 2;
$name = "Panel Admin";
include_once './includes/header.php';
function customHead(){?>
    <link rel="stylesheet" href="./css/adminp-style.css">
<?php }

?>
<body>
<!--INTENTO DE PHP -->

<?php 
$db_server = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'grupo9';

$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
     $fecha = date("Y/m/d");
     $fecha2 = str_replace("/","-",$fecha);
     $sql = "SELECT * FROM user;";
     $comp = "SELECT * FROM user WHERE type ='COMPANY'";
     $consul = "SELECT * FROM inquiries";
     $result = mysqli_query($conn,$sql);
     $compXD = mysqli_query($conn,$comp);   
     $consulXD = mysqli_query($conn,$consul);

     $resultCheck = mysqli_num_rows($result);
     $resultComp = mysqli_num_rows($compXD);
     $resultConsul = mysqli_num_rows($consulXD);
     $numero = 0;
     $consultadehoy = 0;
     if($resultConsul >0){
         while ($row = mysqli_fetch_assoc($consulXD)){
              $fechita = $row['date'];
              $fechaca = "";
              for($var = 0;$var<10;$var = $var + 1){
                  $fechaca .= $fechita[$var];
              }
             if($fechaca == $fecha2){
                 $consultadehoy = $consultadehoy + 1;
             }
                
             } 
         }
     

     
    
    
?>

<input type="checkbox" id="check">
<label for="check">
    <id class="fas fa-bars menuIcon" id="btn"></i>
    <i class="fas fa-times menuIcon" id="cancel"></i>
</label>
<div class="sidebar">
    <ul>
        <li><a href="#"><i class="fas fa-home"></i>Panel</a></li>
        <li><a href="#"><i class="fas fa-users"></i>Gestionar Clientes</a></li>
        <li><a href="#"><i class="fas fa-tractor"></i>Gestionar Parcelas</a></li>
        <li><a href="#"><i class="fas fa-comment-alt"></i>Consultas</a></li>
    </ul>
    <br>
    <hr>
    <div class="userInfo"></div>
</div>

<h1>BIENVENIDO AL PANEL DE ADMINISTRADOR</h1>
    <hr>
    <div class="texto_debajo_titulo">
        <h3>Desde aqui podras gestionar y administrar todas las cuentas de tus
            clientes y ver las consultas que hayan realizado</h3>
    </div>
    
    <div class="container">
        <div class="box">
          <h1><?php echo $resultCheck?></h1>
          <p>Nº de clientes</p>
        </div>
        <div class="box">
        <h1><?php echo $resultComp?></h1>
        <p>Nº de corporativas</p>
        </div>
        <div class="box">
        <h1><?php echo $consultadehoy?></h1>
        <p>Nº de consultas enviadas hoy</p>
        </div>
        <div class="box">
        <h1>78</h1>
        <p>Nº de sensores en funcionamiento</p>
        </div>
    </div>
    
<button class="btn_logout" type="button" onclick="disconnect()">Cerrar sesión</button>

<script>
  
</script>

<script src="./js/closeSession.js"></script>
<?php include_once './includes/footer.php';?>
</body>



</html>