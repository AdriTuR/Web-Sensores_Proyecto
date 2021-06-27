<?php
$t = 2;
$name = "Panel Admin - Inicio";
include_once './includes/header.php';
include_once './api/includes/adminStats.php';

//--------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------HEADER DE LA PÁGINA----------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------//

function customHead(){?>

    <!-----------------------------------------BOOSTRAP--------------------------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!------------------CSS-------------------->

    <link rel="stylesheet" href="./css/adminPanel-style.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">

<?php }
?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- POPUP CERRAR SESION--------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/panelsesion.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<body id="body">

<!-------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------MENU------------------------------------------------------------>

<?php include_once './includes/menu_admin.php';?>

<script>
    var removeMe = document.getElementById("inicio_panel_admin");
    removeMe.innerHTML = '';
</script>

<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------CONTENIDO PANEL DE USUARIO----------------------------------------------->
<div id="contenido_panel-admin">
    <!------------------------------------------------------------------------------->
    <!----------------------------APARTADO DE BIENVENIDA----------------------------->

    <div class="apartado_bienvenida_admin">
        <h1 class="titulo_panel_admin">BIENVENIDO AL PANEL DE ADMINISTRADOR</h1>
        <hr class="line_admin">
        <p class="texto_panel_admin">Desde aquí podrás gestionar y administrar todas las cuentas de tus clientes y ver las consultas que se hayan realizado.</p>
    </div>
    <!------------------------------------------------------------------------------->
    <!------------------------STATS MODO DESKTOP------------------------------------->

    <div class="stat_container justify-content-center">
        <div class="stat_box">
            <a href="admin_management.php">
                <i class="far fa-eye fa-4x"></i>
                <div class="stat_indicador"><?php echo $nCustomers?></div>
                <p class="stat_texto">Nº de usuarios</p>
            </a>
        </div>
        <div class="stat_box">
            <a href="admin_consultas.php">
                <i class="far fa-eye fa-4x"></i>
                <div class="stat_indicador"><?php echo $todayInquiries?></div>
                <p class="stat_texto">Nº de consultas Hoy</p>
            </a>
        </div>
        <div class="stat_box">
            <a href="admin_management.php">
                <i class="far fa-eye fa-4x"></i>
                <div class="stat_indicador">70</div>
                <p class="stat_texto">Nº de sensores</p>
            </a>
        </div>
    </div>

</div>

<!-------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------FOOTER-------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/footer.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------SCRIPTS------------------------------------------------------->

<!-------------------------------Cerrar Sesion------------------------------------------->
<script src="./js/closeSession.js"></script>
<script src="./js/checkAdminLogin.js"></script>
<!---------------------------- Separate Popper and Boostrap JS ---------------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!-------------------------------------------------------------------------------------------------------------------->

</body>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FIN BODY DE LA PÁGINA ------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------->
