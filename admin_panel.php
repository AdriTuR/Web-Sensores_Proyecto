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
        <i class="fas fa-bars menuIcon" id="btn"></i>
        <i class="fas fa-times menuIcon" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header> PANEL DE ADMIN </header>   
    <ul>
        <li><a href="#"><i class="fas fa-home"></i>Panel</a></li>
        <li><a href="#"><i class="fas fa-users"></i>Gestionar Clientes</a></li>
        <li><a href="#"><i class="fas fa-tractor"></i>Gestionar Parcelas</a></li>
        <li><a href="admin_consultas.php"><i class="fas fa-comment-alt"></i>Consultas</a></li>
        <li><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
    </ul>
    <br>
        <hr class="line">
        <footer> <i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer> 
    </div>

    <div class="title"><h1>BIENVENIDO AL PANEL DE ADMINISTRADOR</h1></div>
    <hr>
    <div class="texto_debajo_titulo">
        <h3>Desde aqui podras gestionar y administrar todas las cuentas de tus
            clientes y ver las consultas que hayan realizado</h3>
    </div>
    
    <div class="container">
        <div class="box" onclick="location.href='admin_clientes.php'">
          <h1><?php echo $nCustomers?></h1>
          <p>Nº de clientes</p>
        </div>
        <div class="box">
        <h1><?php echo $nCompanies?></h1>
        <p>Nº de corporativas</p>
        </div>
        <div class="box"onclick="location.href='admin_consultas.php'">
        <h1><?php echo $todayInquiries?></h1>
        <p>Nº de consultas enviadas hoy</p>
        </div>
        <div class="box">
        <h1>78</h1>
        <p>Nº de sensores en funcionamiento</p>
        </div>
    </div>
<script>
    window.addEventListener("load", function(){
        fetch("./api/v1/", {
            method: "GET"
        }).then(function (result) {
            if(result.status == 200){
                return result.json();
            }
        }).then(function (data) {
            if(data != null){
                if(data.role == "USER"){
                    location.href = "./user_panel.php";
                }
            }
        });
    });
</script>
<?php include_once './includes/footer.php';?>
</body>
<script src="./js/closeSession.js"></script>
</html>