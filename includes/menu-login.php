<nav>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

    <ul class="menu">
        <li onclick="menucerrar()"><div class="menu_icon"><i class="fas fa-hand-holding"></i><a href="./index.php#mas_informacion">Qué te ofrecemos</a></div></li>
        <li onclick="menucerrar()"><div class="menu_icon"><i class="fas fa-info-circle"></i><a href="./index.php#informacion_web">Más información</a></div></li>
        <li onclick="menucerrar()"><div class="menu_icon"><i class="fas fa-users"></i><a href="./index.php#acerca_de_nosotros">Acerca de nosotros</a></div></li>
        <li onclick="menucerrar()"><div class="menu_icon"><a href="index.php">Volver</a></div></li>
    </ul>
</nav>

<!------- SCRIPT DE CERRAR EL MENU ------->
<script>
    function menucerrar(){
        setTimeout(function (){
            document.getElementById("menu-btn").checked = false
        },1000)
    }
</script>