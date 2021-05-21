<?php
$t = 2;
$name = "Panel Admin";
include_once './includes/header.php';
include_once './api/includes/adminStats.php';
function customHead(){?>
    <link rel="stylesheet" href="./css/adminc-style.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
<?php }
?>
<body>
<input type="checkbox" id="check"><
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
        <li><a href="#"><i class="fas fa-comment-alt"></i>Consultas</a></li>
        <li><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
    </ul>
</div>
<section class="conjunto">

<div class="espacio_canvas">
    <canvas id="myCanvas">

    </canvas>
</div>





</section>
<?php include_once './includes/footer.php';?>
</body>