<?php
$t = 2;
$name = "Panel Usuario";
include_once './includes/header.php';
function customHead(){?>
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
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
<input type="checkbox" id="check">
<label for="check">
    <i class="fas fa-bars menuIcon" id="btn"></i>
    <i class="fas fa-times menuIcon" id="cancel"></i>
</label>

<nav class="sidebar">
    <header> PANEL DE USUARIO </header>
    <hr class="line">
    <ul>
        <li><a href="#"><i class="fas fa-map-marked-alt"></i>TERRENO</a></li>
        <li><a href="#"><i class="fas fa-chart-line"></i>GRÁFICAS</a></li>
        <li><a href="#"><i class="fas fa-user"></i>PERFIL</a></li>
        <li><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
    </ul>
    <br>
    <hr class="line">
    <!---- <div class="userZone"> <footer><i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer></div> --->
</nav>
<!------------------------------------------------------------------------------------------->
<!--------------------------CONTENIDO PANEL DE USUARIO--------------------------------------->

<div class="contenido_panel-usuario">

    <!---------WIDGET FECHA/HORA--------->
    <div class="widget_banner" id="widget_reloj-fecha">
        <div id="fecha"></div>
        <div id="reloj"></div>
    </div>
    <!---------MAPA--------->
    <div id="map"></div>
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
<?php include_once './includes/footer.php';?>
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
            showUserFields(data);
        })

    }
</script>
<script src="./js/closeSession.js"></script>
<script src="./js/map.js"></script>
<!-------------------------------------------------------------------------------------------------------------------->
</body>
</html>
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->