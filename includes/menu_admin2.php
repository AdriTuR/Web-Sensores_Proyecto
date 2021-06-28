<!----------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------->
<!--                                           MENU  - PANEL DE ADMIN                                            -->
<!----------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------->
<nav>

    <!------------------------------------------------------->
    <!----------------------BOTON MENU----------------------->
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn">
        <span class="navicon"></span>
    </label>
    <!------------------------------------------------------->
    <!------------------------SIDEBAR------------------------>
    <div class="sidebar">
        <ul>
            <!----------------Header Menu----------------->
            <li><header> PANEL DE ADMIN </header></li>

            <!--------------Secciones Menu---------------->
            <li onclick="menucerrar()"><a href="admin_panel.php"><i class="bi bi-house-door-fill"></i>Panel</a></li>
            <li onclick="menucerrar()" id="gestion_clientes"><a href="admin_management.php"><i class="bi bi-person-lines-fill"></i>Gestionar Clientes</a></li>
            <li onclick="menucerrar()" id="consult"><a href="admin_consultas.php"><i class="bi bi-journal-text"></i>Consultas</a></li>
            <li onclick="menucerrar()"><a class="btn_logout" type="button"  data-toggle="modal" data-target="#panelsesion"><i class="bi bi-box-arrow-right"></i>CERRAR SESIÓN</a></li>

        </ul>
    </div>
</nav>
<!------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------- SCRIPT DE CERRAR EL MENU ----------------------------------------------->
<script>
    function menucerrar(){
        setTimeout(function (){
            document.getElementById("menu-btn").checked = false
        },1000)
    }
</script>
<!------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------>
