
<?php
$t = 3;
$name = "Login";
include_once './includes/header.php';
function customHead(){?>
    <link rel="stylesheet" href="./css/login-style.css">
    <link rel="stylesheet" href="./css/common.css">
<?php }
?>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<body id="body">
<!---------------------------- HEADER DE LA PÁGINA  ------------------------------------------->

<!---------------------------- FIN HEADER DE LA PÁGINA  --------------------------------------->

<!--------------------------------- FORM CONTENT ----------------------------------------------->
<section id="login-form">
    <div id="main">
        <div id="textobienvenido">

            <h1>BIENVENIDO</h1>
            <p>Accede al panel de usuario con su cuenta para visualizar sus terrenos desde la web y controlar el estado de sus cultivos.</p>

        </div>

        <div id="box">
            <div id="box1">
                <h1>INICIO DE SESIÓN</h1>
                <hr class="line">

                <p class="introtext">Introduce tus datos para acceder al panel de usuario.</p>
                <p id="loginError"></p>
            </div>

            <div id="box2">
                <form id="loginForm">
                    <p class="textologin">Usuario:</p>
                    <input type="text" name="username" placeholder="&#xf2bd; Introduce tu usuario" style="font-family:Arial, FontAwesome" required>
                    <p class="textologin">Contraseña:</p>
                    <input type="password" name="passwd" placeholder="&#xf084; Introduce tu contraseña" style="font-family:Arial, FontAwesome" required>
                    <a href="#" id="olvidar" onclick="abrirFormulario()">
                        <p id="olvidado">¿Has olvidado tu contraseña?</p>
                    </a>
                    <input type="submit" id="loginBtn" class="submit" value="INICIAR SESIÓN" required>
                    <br>
                </form>
            </div>
        </div>
    </div>


    <!--------------------------------- Formulario de "¿Has olvidado tu contraseña?"----------------->
    <div class="popup-formulario" id="formulario_olvidar">
        <div class="box" id="box-contacto">
            <img src="images/landing_page/close_icon3png.png" id="closeForm" alt="cerrar formulario" width="40px" height="40px" class="cerrar-formulario" onclick="cerrarFormulario()">

            <div class="container_text_olvidar"id="header-box">
                <h1 id="title" class="titulo_olvidar">¿HAS OLVIDADO TU CONTRASEÑA?</h1>
                <p class="introtext">Introduce tu correo electronico
                    y recibiras en breves tu contraseña</p>
            </div>

            <div id="content-form-box">
                <form class="formulario_contraseña">
                    <p class="correo_formulario_olvidar">Correo:</p>
                    <label for="correo" class="colocar_correo"></label>
                    <input type="text" name="mail" id="correo" placeholder="Escribe tu correo" required maxlength="120" class="colocar_correo_olvidar">

                    <button type="submit" class="submit" id="enviar_recuperar-contarseña"><a>ENVIAR</a></button>
                </form>
                <script src="./js/sendRecoveryMail.js"></script>
            </div>
        </div>
    </div>

    <div class="popup-mensaje_confirmacion" id="mensaje_confirmacion">
        <div class="box_confirmacion" id="box-confirmacion">
            <div id="content-confirm-box">
                <h1 id="title">CAMBIO DE CONTRASEÑA</h1>
                <img src="images/landing_page/check_icon.png" id="confirmBtn" alt="confirmación" width="85px" height="79px" class ="confirmacion">
                <p id="text">Revisa tu correo para encontrar la nueva contraseña.</p>
                <button id="cerrar_confirmacion" onclick="cerrarConfirmacion()">CERRAR</button>
            </div>
        </div>
    </div>
</section>

<!---------------------SCRIPTS PARA LA VENTANA DE CONTRASEÑA OLVIDADA--------------------->
<script>
    //-------------------FUNCIÓN ABRIR FORMULARIO---------------------//
    function abrirFormulario() {
        document.getElementById("formulario_olvidar").style.visibility = "visible";
        document.getElementById("formulario_olvidar").style.display = "flex";
        document.getElementById("box").style.display = "none";
        document.getElementById("footer").style.marginTop = "620px";
    }
    //-------------------FUNCIÓN CERRAR FORMULARIO--------------------//
    function cerrarFormulario() {
        document.getElementById("formulario_olvidar").style.visibility = "hidden";
        document.getElementById("formulario_olvidar").style.display = "none";
        document.getElementById("footer").style.marginTop = "0px";
        document.getElementById("box").style.display = "inherit";
    }
    //----------------------------------------------------------------//
    function mostrarConfirmacion(){
        document.getElementById("mensaje_confirmacion").style.display = "flex";
        document.getElementById("closeForm").style.display = "none";
    }
    //-----------------FUNCIÓN CERRAR CONFIRMACION-------------------//
    function cerrarConfirmacion(){
        cerrarFormulario();
        document.getElementById("mensaje_confirmacion").style.display = "none";
        document.getElementById("closeForm").style.display = "unset";
        document.getElementById("box").style.display = "inherit";
    }

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
                }else if(data.role == "ADMIN"){
                    location.href = "./admin_panel.php";
                }
            }
        });
    });

</script>
<script src="./js/login.js"></script>

<!--------------------------------- FIN FORM CONTENT -------------------------------------------->

<!-------------------------------- FOOTER DE LA PÁGINA ------------------------------------------>
<?php include_once './includes/footer.php';?>
<!------------------------------- FIN FOOTER DE LA PÁGINA ---------------------------------------->
</body>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FIN BODY DE LA PÁGINA ------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------->
