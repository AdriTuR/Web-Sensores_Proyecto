
<nav>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn">
        <span class="navicon"></span>
    </label>
    <div class="sidebar">
        <ul>
            <li><header> PANEL DE ADMIN </header></li>
            <li onclick="menucerrar()"><div class="menu_icon"><a href="#"><i class="fas fa-user "></i>PERFIL</a></div></li>
            <li onclick="menucerrar()"><div class="menu_icon"><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></div></li>
        </ul>

        <br>
    </div>
</nav>
<!------- SCRIPT DE CERRAR EL MENU ------->
<script>
    function menucerrar(){
        setTimeout(function (){
            document.getElementById("menu-btn").checked = false
        },1000)
    }
</script>
