<?php
$t = 5;
$name = "Panel Usuario";
include_once './includes/header.php';
function customHead(){?>
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="./css/userp-style.css">
<?php }
?>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<body onload="startTime()">
<!------------------------------------------------------------------------------------------->
<!-----------------------------------------MENU---------------------------------------------->

<!------------------------------------------------------------------------------------------->
<!--------------------------CONTENIDO PANEL DE USUARIO--------------------------------------->

<div class="contenido_panel-usuario">
    <button id="resetMap" onclick="resetMap()">VOLVER ATRAS</button>

    <div id="grafica"></div>


    <!---------WIDGET FECHA/HORA--------->
    <div class="widget_banner" id="widget_reloj-fecha">
        <div id="fecha"></div>
        <div id="reloj"></div>
    </div>
    <!---------MAPA--------->
    <div id="map"></div>

    <!-----DROPUP------>
    <div class="btn-group dropup">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            FINCA DE JOSEBA
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item">
                <div id="nsens">
                    <p class="num">
                        10
                    </p>
                    <p class="texto">
                        nº de sensores
                    </p>
                </div>
                <hr class="line2">
                <div id="mterr">
                    <p class="num">
                        10.385
                    </p>
                    <p class="texto">
                        m² de terreno
                    </p>
                </div>
            </a>
            
        </div>
    </div>
    <br>


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
<!---------------------------------SCRIPTS WIDGET-------------------------------------------->
<script>

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
    //--------------------------------FUNCION checkTime()-----------------------//
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
</script>
<!------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------->

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FOOTER DE LA PÁGINA -------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------------------------------------------------------------------->


<!-------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------ SCRIPTS LOGIN ----------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<script>
    window.addEventListener("load", function(){
        fetch("./api/v1/", {
            method: "GET"
        }).then(function (result) {
            if(result.status == 200){
                return result.json();
            }else{
                location.href = "./login.php";
            }
        }).then(async function (data) {
            if(data != null){
                await initMap();
                addCustomerMap(data.name);
            }
            /*
            if(data.role == "ADMIN"){
                location.href = "/admin_panel.html";
            }
            */
        });
    });

    function addCustomerMap(username){
        userName = username;
        var formData = new FormData();
        formData.append('data', "field");

        fetchData(formData, function(data){
            fieldData = data;
            showUserFields();
        })

    }
</script>
<script>
    function abrirIframe(id){
        grafica.innerHTML = '<iframe src="http://localhost/9studios-web/graphic.php?id=' + id + '" id="grafica_panel" class="grafica_panel"> </iframe>';
        document.getElementById("grafica_panel").style.display = "flex"
    }
</script>
<script src="./js/closeSession.js"></script>
<script src="./js/map.js"></script>
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