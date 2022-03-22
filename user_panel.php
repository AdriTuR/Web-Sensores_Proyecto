<?php
$t = 5;
$name = "Panel Usuario - Terrenos";
include_once './includes/header.php';

//--------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------HEADER DE LA PÁGINA----------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------//

function customHead(){?>

    <!---------------------------------------GOOGLE MAPS-------------------------------------------------->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=drawing" async defer></script>

    <!-----------------------------------------BOOSTRAP--------------------------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!------------------CSS-------------------->
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="css/userPanel-style.css">


<?php }
?>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<body onload="startTime()">
<!-------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------MENU------------------------------------------------------------->
<script>
    var removeMe = document.getElementById("userpanel");
    removeMe.innerHTML = '';
</script>
<!-------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------CONTENIDO PANEL DE USUARIO-------------------------------------------------->


<div class="contenido_panel-usuario">

    <!------------------------------------------------------->
    <!-----------------WIDGET FECHA/HORA--------------------->

    <div class="widget_banner" id="widget_reloj-fecha">
        <div id="fecha"></div>
        <div id="reloj"></div>
    </div>
    <!------------------------------------------------------------------------------------>
    <!---------------------------------------AVISOS--------------------------------------->

    <!------------------------------------------------>
    <!-----------------AVISO CAMPO-------------------->
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="aviso_gestion_campo">

        <div class="contenido-aviso">
            <strong id="text1_aviso">VAS A AÑADIR UN CAMPO</strong>
            <p id="text2_aviso">Selecciona un minimo de 3 puntos para delimitar el nuevo campo. Asegurate de selecionarlos en orden.</p>
        </div>
    </div>
    <!------------------------------------------------>
    <!----------------AVISO PARCELA------------------->
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="aviso_gestion_parcela">

        <div class="contenido-aviso">
            <strong id="text1_aviso">VAS A AÑADIR UNA PARCELA</strong>
            <p id="text2_aviso">Selecciona un minimo de 3 puntos para delimitar la nueva parcela. Asegurate de selecionarlos en orden.</p>
        </div>
    </div>
    <!------------------------------------------------>
    <!----------------AVISO SENSOR-------------------->
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="aviso_gestion_sensor">

        <div class="contenido-aviso">
            <strong id="text1_aviso">VAS A AÑADIR UN SENSOR</strong>
            <p id="text2_aviso">Selecciona una parcela y después seleciona un punto para colocar el sensor</p>
        </div>
    </div>
    <!------------------------------------------------------------------------------------>
    <!---------------------------------------ALERTS--------------------------------------->

    <!------------------------------------------------------>
    <!-----------------------MAPA--------------------------->

    <div id="map"></div>
    <div id="grafica"></div>

    <!------------------------------------------------------>
    <!----------------BOTON VOLVER ATRÁS-------------------->

    <div class="botones_panel-usuario" id="boton_panel_usuario">
        <!--
        <button class="boton_centrar">
            <img src="./images/icons/centrar_icon.png" onclick="recenterMap()" alt="boton de centrar">
        </button>
        -->
        <button class="boton_volver_atras" id="resetMap" onclick="resetMap(), aparecerBotonCampo()">
            <img src="./images/icons/return_icon.png" alt="boton volver atrás">
        </button>
    </div>

    <!------------------------------------------------------>
    <!---------------BOTONES GESTION ADMIN------------------>

    <div class="botones_panel-gestion">

        <!------------------------------------------------>
        <!---------------AÑADIR CAMPO------------------->
        <button class="botones_gestion" id="boton_anyadir_campo" onclick="mostrarAnyadirCampo()">
            <img src="./images/icons/gestion_mapa/terreno.png" alt="boton añadir terreno" id="icono_terreno">
        </button>

        <div id="botones_panel_gestion2">
            <!------------------------------------------------>
            <!---------------AÑADIR PARCELA------------------->
            <button class="botones_gestion" id="boton_anyadir_parcela" onclick="mostrarAnyadirParcela()">
                <img src="./images/icons/gestion_mapa/parcela.png" alt="boton añadir terreno" id="icono_parcela">
            </button>
            <!------------------------------------------------>
            <!----------------AÑADIR SENSOR------------------->
            <button class="botones_gestion" id="boton_anyadir_sensor" onclick="mostrarAnyadirSensor()">
                <img src="./images/icons/gestion_mapa/sensor.png" alt="boton añadir terreno" id="icono_sensor">
            </button>
        </div>

    </div>

    <!------------------------------------------------>
    <!-----------BOTONES DE AÑADIR Y CERRAR----------->

    <div id="botones_confirmar_cerrar_campo">
        <!------------------------------------------------>
        <!---------------CONFIRMAR CAMPO------------------>
        <button  id="confirmar_campo" onclick="ocultarAnyadirCampo(1)">
            <p class="botones_cancelar_confirmar">Confirmar</p>
        </button>
        <!------------------------------------------------>
        <!-----------------CERRAR CAMPO------------------->
        <button  id="cerrar_campo" onclick="ocultarAnyadirCampo(2)">
            <p class="botones_cancelar_confirmar">Cancelar</p>
        </button>
    </div>

    <div id="botones_confirmar_cerrar_parcela">
        <!------------------------------------------------>
        <!--------------CONFIRMAR PARCELA----------------->
        <button  id="confirmar_parcela" onclick="ocultarAnyadirParcela(1)">
            <p class="botones_cancelar_confirmar">Confirmar</p>
        </button>
        <!------------------------------------------------>
        <!----------------CERRAR PARCELA------------------>
        <button  id="cerrar_parcela" onclick="ocultarAnyadirParcela(2)">
            <p class="botones_cancelar_confirmar">Cancelar</p>
        </button>
    </div>

    <div id="botones_confirmar_cerrar_sensor">
        <!------------------------------------------------>
        <!--------------CONFIRMAR PARCELA----------------->
        <button  id="confirmar_sensor" onclick="ocultarAnyadirSensor(1)">
            <p class="botones_cancelar_confirmar">Confirmar</p>
        </button>
        <!------------------------------------------------>
        <!----------------CERRAR PARCELA------------------>
        <button  id="cerrar_sensor" onclick="ocultarAnyadirSensor(2)">
            <p class="botones_cancelar_confirmar">Cancelar</p>
        </button>
    </div>


    <!------------------------------------------------------>
    <!---------------------IFO-BOX-------------------------->

    <div class="btn-group dropup">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            FINCA DE JOSEBA
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item">
                <div id="nsens">
                    <p id="numSensores" class="num">
                        -1
                    </p>
                    <p class="texto">
                        nº de sensores
                    </p>
                </div>
                <hr class="line2">
                <div id="mterr">
                    <p id="m2Terreno" class="num">
                        -1
                    </p>
                    <p class="texto">
                        m² de terreno
                    </p>
                </div>
            </a>
        </div>
    </div>


    <!-- Panel Consulta -->
    <?php  include_once './includes/popupConsult.php';  ?>
    <!------------------------------------------------------>
    <!--------------POPUP CERRAR SESIÓN--------------------->

    <div class="modal" id="panelsesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo1">CERRAR SESIÓN</h5>
                    <hr class="line">
                </div>
                <div class="modal-body">
                    <p id="texto1">
                        ¿Estás seguro de que quieres cerrar sesión?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="boton" onclick="disconnect()">SI</button>
                    <button type="button" class="boton" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------- SCRIPTS ------------------------------------------------------>
    <!-------------------------------------------------------------------------------------------------------------------->

    <!---------------------------------------------------------------------------------------->
    <!---------------------------------Widget Hora/Fecha-------------------------------------->

    <script>

        //--------------------------------------------------------------------------//
        //--------------------------------FUNCION StartTime()-----------------------//
        function startTime() {

            //---------HORA--------//
            var today = new Date();
            var hr = today.getHours();
            var min = today.getMinutes();
            min = checkTime(min);
            document.getElementById("reloj").innerHTML = hr + ":" + min;

            //--------FECHA--------//
            var months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            var curDay = today.getDate();
            var curMonth = months[today.getMonth()];
            var curYear = today.getFullYear();
            var date = curDay+"/"+curMonth+"/"+curYear;
            document.getElementById("fecha").innerHTML = date;
            var time = setTimeout(function(){ startTime() }, 500);

        }

        //--------------------------------------------------------------------------//
        //--------------------------------FUNCION checkTime()-----------------------//

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

    </script>

    <!--------------------------------------------------------------------------------------->
    <!--------------------------------------Login-------------------------------------------->

    <script>
        var viewUser = null;
        <?php
        if(isset($_GET['viewAsUser'])){
        ?>
        viewUser = "<?php echo $_GET['viewAsUser']; ?>";
        <?php
        }
        ?>

        window.addEventListener("load", function(){
            desaparecerBotonCampo2();
            fetch("./api/v1/session", {
                method: "GET"
            }).then(function (result) {
                if(result.ok){
                    return result.json();
                }else{
                    location.href = "./login.php";
                }
            }).then(async function (data) {
                if(data != null){
                    if(viewUser != null  && data.role == "USER"){
                        ocultarAnyadirCampoInit();
                        location.href = "./user_panel.php";
                        return;
                    }

                    await initMap();
                    if(viewUser != null && data.role == "ADMIN"){
                        addCustomerMap(viewUser);
                        aparecerBotonCampo2();
                    }else addCustomerMap(data.name);

                }
            });
        });

        function addCustomerMap(username){
            userName = username;
            var formData = new FormData();

            fetchData(formData, "field", function(data){
                fieldData = data;
                showUserFields();
            })
        }
    </script>
    <!---------------------------------------------------------------------------------------->
    <!----------------------------------Cerrar Sesión----------------------------------------->
    <script src="./js/closeSession.js"></script>
    <!---------------------------------------------------------------------------------------->
    <!-------------------------------Mapa Interactivo----------------------------------------->
    <script src="./js/map.js"></script>
    <!---------------------------------------------------------------------------------------->
    <!--------------------------------Botones Gestion----------------------------------------->
    <script>

        /*----------------Aparicion de los Botones----------------*/

        function aparecerBotonesParcelaAndSensor(){
            document.getElementById('botones_panel_gestion2').style.display = "flex"

            document.getElementById('boton_anyadir_campo').style.display = "none"

        }

        function aparecerBotonCampo(){
            document.getElementById('botones_panel_gestion2').style.display = "none"
            document.getElementById('boton_anyadir_campo').style.display = "block"
        }

        function aparecerBotonCampo2(){
            document.getElementById('boton_anyadir_campo').style.display = "block"
        }

        function desaparecerBotonCampo2(){
            document.getElementById('boton_anyadir_campo').style.display = "none"
        }


        /*---------------------Activar Aviso---------------------*/

        function mostrarAnyadirCampo(){
            document.getElementById('aviso_gestion_campo').style.display = "flex"
            document.getElementById('botones_confirmar_cerrar_campo').style.display = "flex"
            document.getElementById('boton_anyadir_campo').style.display = "none"
            document.getElementById('widget_reloj-fecha').style.display = "none"
            document.getElementById('boton_panel_usuario').style.display = "none"

            activateDrawBar(false);

        }

        function ocultarAnyadirCampoInit() {
            document.getElementById('boton_anyadir_campo').style.display = "none"
        }

        function ocultarAnyadirCampo(t){
            document.getElementById('aviso_gestion_campo').style.display = "none"
            document.getElementById('botones_confirmar_cerrar_campo').style.display = "none"
            document.getElementById('boton_anyadir_campo').style.display = "block"
            document.getElementById('boton_panel_usuario').style.display = "flex"
            document.getElementById('widget_reloj-fecha').style.display = "flex"

            if(t == 1){
                //save
                saveFieldPolygon();
            }else{
                //delete
                clearDrawings();
            }

            disableDrawBar();

        }

        function mostrarAnyadirParcela(){
            document.getElementById('aviso_gestion_parcela').style.display = "flex"
            document.getElementById('botones_confirmar_cerrar_parcela').style.display = "flex"
            document.getElementById('botones_panel_gestion2').style.display = "none"
            document.getElementById('widget_reloj-fecha').style.display = "none"
            document.getElementById('boton_panel_usuario').style.display = "none"
            activateDrawBar(false);
            plotPolygon = true;
        }

        function ocultarAnyadirParcela(t){
            document.getElementById('aviso_gestion_parcela').style.display = "none"
            document.getElementById('botones_confirmar_cerrar_parcela').style.display = "none"
            document.getElementById('botones_panel_gestion2').style.display = "block"
            document.getElementById('boton_panel_usuario').style.display = "flex"
            document.getElementById('widget_reloj-fecha').style.display = "flex"

            if(t == 1){
                //save
                savePlotPolygon();
            }else{
                //delete
                clearDrawings();
            }
            plotPolygon = false;
            disableDrawBar();
        }

        function mostrarAnyadirSensor(){
            document.getElementById('aviso_gestion_sensor').style.display = "flex"
            document.getElementById('botones_confirmar_cerrar_sensor').style.display = "flex"
            document.getElementById('botones_panel_gestion2').style.display = "none"
            document.getElementById('widget_reloj-fecha').style.display = "none"
            document.getElementById('boton_panel_usuario').style.display = "none"
            activateDrawBar(true);
        }

        function ocultarAnyadirSensor(t){
            document.getElementById('aviso_gestion_sensor').style.display = "none"
            document.getElementById('botones_confirmar_cerrar_sensor').style.display = "none"
            document.getElementById('botones_panel_gestion2').style.display = "block"
            document.getElementById('boton_panel_usuario').style.display = "flex"
            document.getElementById('widget_reloj-fecha').style.display = "flex"

            if(t == 1){
                //save
                saveProbesMarker();
            }else{
                //delete
                clearDrawings();
            }

            disableDrawBar();
        }

    </script>
    <!---------------------------------------------------------------------------------------->
    <!------------------------------------- Iframe ------------------------------------------->
    <script>
        function abrirIframe(id){
            grafica.innerHTML = '<iframe src="./graphic.php?id=' + id + '" id="grafica_panel" class="grafica_panel"> </iframe>';
            document.getElementById("grafica_panel").style.display = "flex"
        }
        function cerrarIframe(){
            document.getElementById("grafica_panel").remove();
        }
    </script>
    <!---------------------------------------------------------------------------------------->
    <!---------------------------- Separate Popper and Boostrap JS ---------------------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
            integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <!-------------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------------------------------------->

</body>

<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->