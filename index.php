<?php include '/includes/header.php';?>
<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/common.css" />
    <title>Home</title>
</head>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<body id="body">
    <!------------------------------------- PRIMERA SECCIÓN DE LA PÁGINA --------------------------------------------->
    <section class="call_to_action">
        <div id="contenido call_to_action">
            <h1 class="fistText morado">CONTROLA TUS CULTIVOS DESDE CUALQUIER SITIO</h1>
            <br>
            <p class="secondText justifyText">¿Eres una agricultor con una explotación
                agraria y te gustaría ahorrarte tiempo
                y trabajo? </p>
            <p class="secondText justifyText">Con nuestros sensores es posible, te
                damos la oportunidad de ver el estado de
                tus cultivos desde cualquier
                sitio. </p>
            <br>
            <a class="boton" onclick="abrirFormulario()">CONTÁCTANOS</a>
        </div>
        <!--------------------------------FORMULARIO DE CONTACTO------------------------------->
        <div class="popup-formulario" id="formulario_contacto">
            <div class="box" id="box-contacto">
                <div id="header-box">
                    <img src="images/landing_page/close_icon3png.png" alt="cerrar formulario" width="40px" height="40px" class="cerrar-formulario" onclick="cerrarFormulario()">
                    <h1 id="title">CONTÁCTANOS</h1>
                    <hr class="linea_formulario"id="line" width="283" size=2px color="#830053">
                    <p id="intro-text">Envíanos tu consulta y te contestaremos en un plazo de 24 horas.</p>
                </div>
                <div id="content-form-box">
                    <form id="form_contact">
                        <p>
                            <label for="nombre" class="colocar_nombre">Nombre:</label>
                            <input type="text" name="introducir_nombre" id="nombre" placeholder="Escribe tu nombre" required maxlength="30" minlength="3">
                        </p>
                        <p>
                            <label for="apellidos" class="colocar_apellidos">Apellidos: <i class="cursiva">(Opcional)</i></label>
                            <input type="text" name="introducir_apellidos" id="apellidos" placeholder="Escribe tus apellidos" maxlength="60"  minlength="3">
                        </p>
                        <p>
                            <label for="correo" class="colocar_correo">Correo:</label>
                            <input type="correo" name="introducir_correo" id="correo" placeholder="Escribe tu correo" required maxlength="50"  minlength="5">
                        </p>
                        <p>
                            <label for="mensaje" class="colocar_mensaje">Motivo de la consulta:</label>
                            <textarea name="introducir_mensaje" class="texto_mensaje" id="mensaje" placeholder="Deja aquí tu consulta" required  minlength="5"></textarea>
                        </p>
                        <button type="submit" name="enviar_formulario" id="enviar"><a>ENVIAR</a></button>
                    </form>
                    <script src="/js/sendForm.js"></script>
                </div>
            </div>
        </div>
        <!----------------- MENSAJE DE CONFIRMACION ----------------->
        <div class="popup-mensaje_confirmacion" id="mensaje_confirmacion">
            <div class="box_confirmacion" id="box-confirmacion">
                <div id="content-confirm-box">
                    <h1 id="title">TU CONSULTA HA SIDO ENVIADA CORRECTAMENTE</h1>
                    <img src="images/landing_page/check_icon.png" alt="confirmación" width="85px" height="79px" class ="confirmacion">
                    <p id="text">En un plazo de 24 horas. recibirá su respuesta</p>
                    <button id="cerrar_confirmacion" onclick="cerrarConfirmacion()">CERRAR</button>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------>

        <!---------------------SCRIPTS PARA EL FORMULARIO DE CONTACTO--------------------->
        <script>
            //-------------------FUNCIÓN ABRIR FORMULARIO---------------------//
            function abrirFormulario() {
                document.getElementById("formulario_contacto").style.display = "flex";
                document.getElementById("body").style.overflow = "hidden"
                document.getElementById("contenido call_to_action").style.filter = "blur(8px)"
                document.getElementById("menu-btn").disabled = true;
                document.documentElement.scrollTop = 0;
            }
            //-------------------FUNCIÓN CERRAR FORMULARIO--------------------//
            function cerrarFormulario() {
                document.getElementById("formulario_contacto").style.display = "none";
                document.getElementById("body").style.overflow = "scroll";
                document.getElementById("contenido call_to_action").style.filter = "none";
                document.getElementById("menu-btn").disabled = false;
            }
            //-----------------FUNCIÓN MOSTRAR CONFIRMACION-------------------//
            function mostrarConfirmacion(){
                document.getElementById("mensaje_confirmacion").style.display = "flex";
                document.getElementById("body").style.overflow = "hidden"
                document.getElementById("contenido call_to_action").style.filter = "blur(8px)"
                document.getElementById("menu-btn").disabled = true;
                cerrarFormulario();
            }
            //-----------------FUNCIÓN CERRAR CONFIRMACION-------------------//
            function cerrarConfirmacion(){
                document.getElementById("mensaje_confirmacion").style.display = "none";
                document.getElementById("body").style.overflow = "scroll";
                document.getElementById("contenido call_to_action").style.filter = "none";
                document.getElementById("menu-btn").disabled = false;
            }
            //-------------------FUNCIÓN LIMPIAR FORMULARIO--------------------//
            function limpiarFormulario() {
                document.getElementById("form_contact").reset();
            }
        </script>

        <!------------------------------------------------------------------------------------->

        <br>
        <a class="scrollBttn srollBttnDown" href="#mas_informacion"></a>
    </section>
    <!------------------------------------ FIN PRIMERA SECCIÓN DE LA PÁGINA ------------------------------------------>


    <!------------------------------------- SEGUNDA SECCIÓN DE LA PÁGINA --------------------------------------------->
    <section class="mas_informacion" id="mas_informacion">
        <h1 class="banner">¿QUE TE OFRECEMOS?</h1>
        <br>
        <p class="blanco justifyText headSection">Nuestra empresa fabrica sensores para explotaciones agricolas,
            que son capaces de proporcionar datos al detalle y en tiempo real sobre el estado de los cultivos
            para posteriormente visualizarlos en esta página web.</p>
        <br>
        <p class="blanco secondText">Analizamos tu campo de cultivo y te ofrecemos un paquete completo
            que incluye:</p>
        <br>

        <div class="features_info thirdtext">
            <a><img class="iconosensor" src="images/landing_page/sensor_icon3.png" alt="icono de un sensor"
                    style="width: 23%;"></a>

            <p class="blanco">El número de sensores que necesites.</p>
            <br>
            <a><img class="iconoherramienta" src="images/landing_page/instalacion_icon.png" alt="icono de herramientas"
                    style="width: 12%;"></a>

            <p class="blanco">Instalación de los sensores.</p>
            <br>
            <a><img class="iconopersona" src="images/landing_page/user_icon.png" alt="icono de una persona"
                    style="width: 12%;"></a>

            <p class="blanco" style="margin-bottom: 20px; margin-left: 70px; margin-right: 70px;">Cuenta para acceder a
                las
                funcionalidades de la web</p>
            <br>
        </div>

    </section>
    <!------------------------------------ FIN SEGUNDA SECCIÓN DE LA PÁGINA ------------------------------------------>


    <!------------------------------------- TERCERA SECCIÓN DE LA PÁGINA --------------------------------------------->
    <section class="informacion_web" id="informacion_web">
        <div id="contenido_informacion_web">

            <h1 class="banner">MÁS INFORMACIÓN</h1>
            <p class="blanco justifyText headSection" id="headSection">
                Una vez obtenga su cuenta podra consultar sus parcelas de forma remota desde nuestra
                web y segir el estado de los cultivos de manera sencilla y rápida.
            </p>

            <div id="mapa_interactivo-apartado">
                <img id= "iconomapainteractivo" src="images/landing_page/interactive-map_icon.png" alt="icono de un mapa interactivo">
                <p class="blanco justifyText" id="texto1_información_web">
                    Podrá ver en todo momento la localización de sus sensores en un mapa interactivo.
                </p>
            </div>

            <div id="grafico-apartado">
                <img id= "iconografico" src="images/landing_page/graphic_icon.png" alt="icono de un gráfico">
                <p class="blanco justifyText" id="texto2_información_web">
                    Además podrá ver de manera gráfica los valores de <strong>SALINIDAD</strong>, <strong>HUMEDAD</strong>,
                    <strong>TEMPERATURA</strong>  y <strong>LUMINOSIDAD</strong> en el espacio de tiempo más comodo para usted.
                </p>
            </div>

        </div>

    </section>
    <!------------------------------------ FIN TERCERA SECCIÓN DE LA PÁGINA ------------------------------------------>


    <!-------------------------------------- CUARTA SECCIÓN DE LA PÁGINA --------------------------------------------->
    <section class="acerca_de_nosotros" id="acerca_de_nosotros">
        <h1 class="banner">ACERCA DE NOSOTROS</h1>
        <br>
        <div class="acerca1">
            <p class="blanco justifyText">
                Nuestra empresa GTI es una startup nueva que acaba de empezar en el
                mercado y queremos
                que los agricultores tengan capacidad de tomar decisiones correctas para que los cultivos funcionen
            </p>
            <i class="fas fa-users fa-4x"></i>
        </div>

        <br>

        <div class="objetivos">
            <h2 class="blanco">CONTACTA CON NOSOTROS</h2>
            <br>
            <p class="blanco justifyText">
                Si te interesa lo que te podemos ofrecer, puedes contactarnos a través del formulario anterior
            </p>
            <br>
            <p class="blanco justifyText">
                Si tienes alguna duda, aclarala llamando al siguiente número de teléfono o por correo electrónico
            </p>
        </div>

        <div class="datos_contacto">
            <div class="caja1">
                <a href="tel:666 666 666">
                    <i class="fas fa-phone-alt fa-3x"></i>
                    <p class="blanco">666 666 666</p>
                </a>
            </div>

            <div class="caja2">
                <a href="mailto:gti@upv.es">
                    <i class="fas fa-envelope fa-3x"></i>
                    <p class="blanco">gti@upv.es</p>
                </a>
            </div>
        </div>

        <a class="boton2" href="#header">VOLVER ARRIBA</a>
        
    </section>
    <!------------------------------------- FIN CUARTA SECCIÓN DE LA PÁGINA ------------------------------------------>


    <!----------------------------------------- FOOTER DE LA PÁGINA -------------------------------------------------->
    <?php include '/includes/footer.php';?>
    <!---------------------------------------- FIN FOOTER DE LA PÁGINA ----------------------------------------------->

</body>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FIN BODY DE LA PÁGINA ------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------->

</html>