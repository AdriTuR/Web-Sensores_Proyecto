
<?php
$t = 3;
$name = "password";
include_once './includes/header.php';
function customHead(){?>
    <link rel="stylesheet" href="./css/password.css">
    <link rel="stylesheet" href="./css/common.css">
<?php }
?>

<body>
    <div id="confirmacion_contra">
        <h1>
            VAS A CAMBIAR TU CONTRASEÑA
        </h1>
        <img id="icono" src="images/password/chage-pasword_icon.png" alt="icono de cambio de contraseña">
        <br>
        <p id="texto1">
            ¿Está seguro de que quiere cambiar la contraseña?
        </p>
        <div id="botones">
            <button class="boton" onclick="abrirFormularioContra()">SI</button>
            <button class="boton">NO</button>
        </div>
    </div>

    <div id="formulario_contra">
        <h1>
            CAMBIAR CONTRASEÑA
        </h1>
        <br>
        <p id="texto2">
            Ingrese una nueva contraseña para su cuenta.
            <br>
            Una vez confirmada, iniciará sesión y su nueva contraseña se cambiara.
        </p>
        <label for="contraseña">Nueva contraseña:</label>
        <input type="password" id="contra" placeholder="Nueva contraseña" required maxlength="30" minlength="3">

        <label for="contraseña">Confirmar nueva contraseña:</label>
        <input type="password" id="repetir" placeholder="Confirmar nueva contraseña" required maxlength="30" minlength="3">

        <button class="boton" type="submit" id="boton1" onclick="abrirCheck()">CAMBIAR</button>

    </div>

    <div id="cambiada">
        <h1 id="titulo3">
            CONTRASEÑA CAMBIADA
        </h1>
        <img id="check" src="images/landing_page/check_icon2.png" alt="icono de check">
        <p id="texto3">
            Su contraseña ha sido cambiada con éxito
        </p>
        <button class="boton" id="boton3">CERRAR</button>
    </div>

    <script>
        //-------------------FUNCIÓN ABRIR FORMULARIO---------------------//
        function abrirFormularioContra() {
            document.getElementById("formulario_contra").style.display = "contents";
            cerrarConfirmacionContra()
        }
        function cerrarConfirmacionContra() {
            document.getElementById("confirmacion_contra").style.display = "none";
        }
        
        //-------------------FUNCIÓN ABRIR CHECK---------------------//
        function abrirCheck() {
            document.getElementById("cambiada").style.display = "contents";
            cerrarFormularioContra()
        }
        function cerrarFormularioContra() {
            document.getElementById("formulario_contra").style.display = "none";
        }
    </script>

    <?php include_once './includes/footer.php';?>
</body>