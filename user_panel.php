<?php
    $t = 1;
    $name = "Panel Usuario";
    include_once './includes/header.php';
    function customHead(){?>
        <!-- <link rel="stylesheet" href="./css/adminp-style.css"> --->
    <?php }
?>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

    <h1>Bienvenido usuario</h1>
    <button class="btn_logout" type="button" onclick="disconnect()">Cerrar sesión</button>
    <script>
        window.addEventListener("load", function(){
            fetch("/api/v1/", {
                method: "GET"
            }).then(function (result) {
                if(result.status == 200){
                    return result.json();
                }else{
                    location.href = "./login.html";
                }  
            }).then(function (data) {
                /*
                if(data.role == "ADMIN"){
                    location.href = "/admin_panel.html";
                }
                */
            }); 
        });
    </script>
    <script src="./js/closeSession.js"></script>
</html>