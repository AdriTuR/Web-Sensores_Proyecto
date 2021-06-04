<?php
$t = 2;
$name = "Panel Usuario Perfil";
include_once './includes/header.php';
function customHead(){?>
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="./css/user_profile-style.css">
<?php }
?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------->
<!-----------------------------------------MENU---------------------------------------------->
<input type="checkbox" id="check">
<label for="check">
    <i class="fas fa-bars menuIcon fa-3x" id="btn"><span class="navicon"></span></i>
    <i class="fas fa-times menuIcon fa-3x" id="cancel"></i>
</label>

<nav class="sidebar">
    <header> PANEL DE USUARIO </header>
    <hr class="line_panel">
    <ul>
        <li><a href="user_panel.php"><img id= "iconomapainteractivo" src="images/landing_page/interactive-map_icon.png" alt="icono de un mapa interactivo"></i>TERRENO</a></li>
        <li><a class="btn_logout" type="button" data-toggle="modal" data-target="#panelsesion"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
    </ul>
    <br>
    <hr class="line_panel">
    <!---- <div class="userZone"> <footer><i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer></div> --->
</nav>

<!-- Modal -->
<div class="modal" id="panelsesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo1">CERRAR SESIÓN</h5>
                <hr class="line">
            </div>
            <div class="modal-body">
                <p id="texto1">
                    ¿Estas seguro de que quieres cerrar sesión?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="boton" onclick="disconnect()">SI</button>
                <button type="button" class="boton" data-dismiss="modal">NO</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------->
<!--------------------------CONTENIDO PERFIL DE USUARIO--------------------------------------->



<section>

    <div id="cont1">

        <div id="contenedor1">

            <img id="iconouser" src="images/landing_page/account_icon2.png" alt="icono de un usuario">
            <p id="nombre">Nombre </p>
            <p id="iduser">ID: </p>

        </div>

        <div class="banner">

            <h1>
                DATOS PERSONALES
            </h1>

        </div>

    </div>

    <div id="cont2">

        <div id="contenedor2">

            <div id="identidad">

                <p class="texto1">
                    Nombre:
                </p>

                <p class="texto1">
                    Apellidos:
                </p>

            </div>

            <p class="texto1">
                <i class="fas fa-address-card"></i>
                DNI:
            </p>

            <p class="texto1">
                <i class="fas fa-map-marker-alt"></i>
                Dirección:
            </p>

            <hr class="line">

        </div>

        <div id="contenedor3">

            <p class="texto1">
                <i class="fas fa-envelope"></i>
                Correo:
            </p>

            <p class="texto1">
                <i class="fas fa-phone-alt"></i>
                Teléfono:
            </p>

            <hr class="line">

        </div>

        <div id="contenedor4">

            <p class="texto1">
                <i class="fas fa-calendar-alt"></i>
                Fecha de registro:
            </p>

            <p class="texto1">
                <i class="fas fa-microchip"></i>
                Nº de sensores:
            </p>

        </div>

    </div>

</section>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FOOTER DE LA PÁGINA -------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<?php include_once './includes/footer.php';?>
<!-------------------------------------------------------------------------------------------------------------------->


<!-------------------------------------------------------------------------------------------------------------------->
<!---------------------------- Separate Popper and Boostrap JS ---------------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" 
integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!-------------------------------------------------------------------------------------------------------------------->
</body>
</html>
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->