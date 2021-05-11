+<?php
$t = 1;
$name = "Panel Admin";
include_once './includes/header.php';
function customHead(){?>
    <link rel="stylesheet" href="./css/adminp-style.css">
<?php }
?>
<body>
<input type="checkbox" id="check">
<label for="check">
    <i class="fas fa-bars menuIcon" id="btn"></i>
    <i class="fas fa-times menuIcon" id="cancel"></i>
</label>
<div class="sidebar">
    <ul>
        <li><a href="#"><i class="fas fa-home"></i>Panel</a></li>
        <li><a href="#"><i class="fas fa-users"></i>Gestionar Clientes</a></li>
        <li><a href="#"><i class="fas fa-tractor"></i>Gestionar Parcelas</a></li>
        <li><a href="#"><i class="fas fa-comment-alt"></i>Consultas</a></li>
    </ul>
    <br>
    <hr>
    <div class="userInfo">aaaa</div>
</div>

<h1>Bienvenido admin</h1>
<button class="btn_logout" type="button" onclick="disconnect()">Cerrar sesión</button>

<script>
    window.addEventListener("load", function(){
        fetch("/api/v1/", {
            method: "GET"
        }).then(function (result) {
            if(result.status == 200){
                return result.json();
            }else{
                location.href = "/login.html";
            }
        }).then(function (data) {
            if(data.role == "USER"){
                location.href = "/user_panel.php";
            }
        });
    });
</script>
<script src="./js/closeSession.js"></script>
<?php include_once './includes/footer.php';?>
</body>

</html>