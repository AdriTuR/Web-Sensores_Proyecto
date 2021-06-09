<nav>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn">
        <span class="navicon"></span>
    </label>
    <div class="sidebar">
        <ul>
            <li><header> PANEL DE ADMIN </header></li>
            <li onclick="menucerrar()"><li><a href="admin_panel.php"><i class="fas fa-home"></i>Panel</a></li>
            <li onclick="menucerrar()"><a href="admin_clientes.php"><i class="fas fa-users"></i>Gestionar Clientes</a></li>
            <li onclick="menucerrar()"><a href="admin_plots.php"><i class="fas fa-tractor"></i>Gestionar Parcelas</a></li>
            <li onclick="menucerrar()"><a href="admin_consultas.php"><i class="fas fa-comment-alt"></i>Consultas</a></li>
            <li onclick="menucerrar()"><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
            <li><footer> <i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer></li>
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
