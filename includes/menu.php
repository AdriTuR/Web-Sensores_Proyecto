          <nav>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    
    <ul class="menu">
        <li onclick="menucerrar()"><a href="#mas_informacion">Qué te ofrecemos</a></li>
        <li onclick="menucerrar()"><a href="#informacion_web">Más información</a></li>
        <li onclick="menucerrar()"><a href="#acerca_de_nosotros">Acerca de nosotros</a></li>
        <li onclick="menucerrar()"><a href="login.php">Area de cliente</a></li>
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

<!--- FIN DEL SCRIPT DE CERRAR EL MENU --->


<!---------------------------------------->