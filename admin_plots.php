<?php
$t = 4;
$name = "Panel Admin - Gestión de Parcelas";
include_once './includes/header.php';

//--------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------HEADER DE LA PÁGINA----------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------//

function customHead(){?>

    <!-----------------------------------------BOOSTRAP--------------------------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!------------------CSS-------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="./css/adminPlots-style.css">

<?php }
?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<body>
<!-------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------MENU------------------------------------------------------------>


<!--<input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars menuIcon" id="btn"></i>
        <i class="fas fa-times menuIcon" id="cancel"></i>
    </label>-->
<!--------------------------------SLIDEBAR------------------------------------------->
<!--<nav class="sidebar">
    <header> PANEL DE ADMIN </header>
    <ul>
        <li><a href="admin_panel.php"><i class="fas fa-home"></i>Panel</a></li>
        <li><a href="admin_clientes.php"><i class="fas fa-users"></i>Gestionar Clientes</a></li>
        <li><a href="#"><i class="fas fa-tractor"></i>Gestionar Parcelas</a></li>
        <li><a href="admin_consultas.php"><i class="fas fa-comment-alt"></i>Consultas</a></li>
        <li><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
    </ul>
    <hr class="line">
    <footer> <i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer>
</nav>-->

<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------CONTENIDO PANEL DE USUARIO----------------------------------------------->

<h1 class="banner">GESTIÓN DE PARCELAS</h1>

<!---------------------------------------------------------------------------------------->
<!--------------------------------------BUSQUEDA------------------------------------------>

<div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control search" id="input_buscar" placeholder="Buscar" onkeyup="buscarUsuario()">
</div>

<!---------------------------------------------------------------------------------------->
<!---------------------------------LISTADO DE USUARIOS------------------------------------>

<div class="listado">

    <!-------------------------------------------------------------->
    <!-----------------------Header listado------------------------->
    <div class="listado-header">
        <table cellpadding="0" cellspacing="0" border="0" >
            <thead>
            <tr>
                <th class="listado_icono-cuenta" </th>
                <th class="listado_cliente">Cliente</th>
                <th class="listado_DNI">DNI</th>
                <th class="listado_sensores">Nº Sensores</th>
                <th class="listado_icono-visualizar"></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="listado_contenido scrollbar_table" >

        <!------------------------------------------------------------->
        <!--------------Aviso de Usuario no existente------------------>
        <table cellpadding="0" cellspacing="0" border="0" id="sin_resultados">
            <tbody>
            <tr>
                <td cellpadding="0" cellspacing="0" border="0">
                    <i class="fas fa-user-alt-slash fa-5x"></i>
                    <p id="sin_resultados-texto1">Sin resultados</p>
                    <p id="sin_resultados-texto2">Parece que el usuario que busca no existe.</p>
                </td>
            </tr>
            </tbody>
        </table>
        <!------------------------------------------------------------->
        <!---------------------Listado Usuarios------------------------>
        <table cellpadding="0" cellspacing="0" border="0" id="tabla">
            <tbody>
            <tr class="tr_user">
                <td class="listado_icono-cuenta"><i class="fas fa-user-circle" id="user"></i></td>
                <td class="listado_cliente">Adrián Tur Rubio</td>
                <td class="listado_DNI">20960381K</td>
                <td class="listado_sensores">14</td>
                <td class="listado_icono-visualizar"><i class="far fa-eye fa-2x"></i></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<!-------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------FOOTER-------------------------------------------------------->

<?php include_once './includes/footer.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------SCRIPTS------------------------------------------------------->

<!--------------------------------------Login-------------------------------------------->
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
<!-------------------------------Cerrar Sesion------------------------------------------->
<script src="./js/closeSession.js"></script>
<!------------------------------Buscar Usuario------------------------------------------->
<script>
    function buscarUsuario() {

        var input, filter, table, tr, td, i, txtValue, notFound;
        input = document.getElementById("input_buscar");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabla");
        tr = table.getElementsByClassName("tr_user");
        notFound = document.getElementById("sin_resultados")

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];  /*BUSCA SIMILITUD CON LA COLUMNA CLIENTE*/
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                    notFound.style.display = "";
                }
            }
        }
    }
</script>
<!---------------------------- Separate Popper and Boostrap JS ---------------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!-------------------------------------------------------------------------------------------------------------------->

</body>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FIN BODY DE LA PÁGINA ------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------->






