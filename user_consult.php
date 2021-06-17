<?php
$t = 4;
$name = "Panel Usuario Consult";
include_once './includes/header.php';

//--------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------HEADER DE LA PÁGINA----------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------//

function customHead(){?>
    <!------------------CSS-------------------->
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="./css/userCons-style.css">
<?php }
?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->



<!---->
<body>
<section class="conjunto">

    <div class="box" id="box-consultas">

        <div class="formulario" id="formulario_consulta">

            <div class="titulo_morado"><h1>CONSÚLTANOS</h1></div>

            <hr class="line">

            <p class="texo_debajo">Ponte en contacto con nosotros y atederemos tu consulta en menos de 24h.</p>

            <div id="content-consult-box">

                <form id="form_consult">

                    <p>

                        <label for="tipo_consulta" class="elegir_consulta">Motivo de la consulta: </label>

                        <select id="tipo_consulta">

                            <option value="solicitar_sensores">Solicitar sensores</option>

                            <option value="modificar_terrenos">Modificar terrenos/parcelas</option>

                            <option value="problemas_cuenta">Problemas con la cuenta</option>

                            <option value="problemas_sensores">Problemas con los sensores</option>

                        </select>

                    </p>

                    <p>

                        <textarea name="introducir_consulta" class="texto_consulta" id="consulta" placeholder="Escribe tu consulta..." required maxlength="400" minlength="3"></textarea>

                    </p>

                    <button type="submit" name="enviar_formulario" id="enviar"><a>ENVIAR</a></button>

                </form>

            </div>

        </div>

    </div>

    <!--
    <div class="mensaje_confirmacion" id="confirmacion">

        <div class="box_confirmacion" id="box-confirmacion">

            <div id="content-confirm-box">

                <h1 id="title">TU CONSULTA HA SIDO ENVIADA CORRECTAMENTE</h1>

                <img src="images/landing_page/check_icon.png" alt="confirmación" width="85px" height="79px" class="confirmacion">

                <p id="text">En un plazo de 24 a 48 horas recibirá su respuesta</p>

                <button id="cerrar_confirmacion" onclick="cerrarConfirmacion()">CERRAR</button>

            </div>

        </div>

    </div>
    -->





</section>
<?php include_once './includes/footer.php';?>
</body>