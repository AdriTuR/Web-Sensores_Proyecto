<?php
$t = 2;
$name = "Panel Admin";
include_once './includes/header.php';
include_once './api/includes/adminStats.php';
function customHead(){?>
    <link rel="stylesheet" href="./css/adminp-style.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
<?php }
?>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <id class="fas fa-bars menuIcon" id="btn"></i>
        <i class="fas fa-times menuIcon" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header> PANEL DE ADMIN </header>   
    <ul>
        <li><a href="#"><i class="fas fa-home"></i>Panel</a></li>
        <li><a href="#"><i class="fas fa-users"></i>Gestionar Clientes</a></li>
        <li><a href="#"><i class="fas fa-tractor"></i>Gestionar Parcelas</a></li>
        <li><a href="#"><i class="fas fa-comment-alt"></i>Consultas</a></li>
        <li><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
    </ul>
    <br>
        <hr class="line">
        <footer> <i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer> 
    </div>

    <h1>BIENVENIDO AL PANEL DE ADMINISTRADOR</h1>
    <hr>
    <div class="texto_debajo_titulo">
        <h3>Desde aqui podras gestionar y administrar todas las cuentas de tus
            clientes y ver las consultas que hayan realizado</h3>
    </div>
    
    <div class="container">
        <div class="box">
          <h1><?php echo $nCustomers?></h1>
          <p>Nº de clientes</p>
        </div>
        <div class="box">
        <h1><?php echo $nCompanies?></h1>
        <p>Nº de corporativas</p>
        </div>
        <div class="box">
        <h1><?php echo $todayInquiries?></h1>
        <p>Nº de consultas enviadas hoy</p>
        </div>
        <div class="box">
        <h1>78</h1>
        <p>Nº de sensores en funcionamiento</p>
        </div>
    </div>

<?php include_once './includes/footer.php';?>
</body>
<script src="./js/closeSession.js"></script>
</html>