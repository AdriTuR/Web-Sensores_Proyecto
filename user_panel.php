<?php
    $t = 2;
    $name = "Panel Usuario";
    include_once './includes/header.php';
    function customHead(){?>
        <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
        <link rel="stylesheet" href="./css/panelMenu-style.css">
        <style>
            #map {
                height: 80vh;
                border: solid 1px black;
            }
        </style>
<?php }
?>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<body>
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
        <footer> <i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer>
        
    </nav>
    <div id="map"></div>
    <!------------------------------- FIN BODY DE LA PÁGINA ---------------------------------------->

    <!-------------------------------- FOOTER DE LA PÁGINA ------------------------------------------>
    <?php include_once './includes/footer.php';?>
    <!------------------------------- FIN FOOTER DE LA PÁGINA ---------------------------------------->

<script>
    window.addEventListener("load", function(){
        fetch("/api/v1/", {
            method: "GET"
        }).then(function (result) {
            if(result.status == 200){
                return result.json();
            }else{
                location.href = "./login.php";
            }  
        }).then(async function (data) {
            await initMap();
            addCustomerMap(data.name);
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
</html>