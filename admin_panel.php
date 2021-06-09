<?php
$t = 2;
$name = "Panel Admin";
include_once './includes/header.php';
include_once './api/includes/adminStats.php';
function customHead(){?>
    <!-----------------------------------------BOOSTRAP--------------------------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/adminp-style.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">

<?php }
?>
<body>

    <div class="title"><h1>BIENVENIDO AL PANEL DE ADMINISTRADOR</h1></div>
    <hr>
    <div class="texto_debajo_titulo">
        <h3>Desde aqui podras gestionar y administrar todas las cuentas de tus
            clientes y ver las consultas que hayan realizado</h3>
    </div>
    
    <div class="container">
        <div class="box" onclick="location.href='admin_clientes.php'">
          <h1><?php echo $nCustomers?></h1>
          <p>Nº de clientes</p>
        </div>
        <div class="box">
        <h1><?php echo $nCompanies?></h1>
        <p>Nº de corporativas</p>
        </div>
        <div class="box"onclick="location.href='admin_consultas.php'">
        <h1><?php echo $todayInquiries?></h1>
        <p>Nº de consultas enviadas hoy</p>
        </div>
        <div class="box">
        <h1>78</h1>
        <p>Nº de sensores en funcionamiento</p>
        </div>
    </div>
<script>
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
                }
            }
        });
    });
</script>
<?php include_once './includes/footer.php';?>
</body>
<script src="./js/closeSession.js"></script>
</html>