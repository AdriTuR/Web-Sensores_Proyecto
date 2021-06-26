<!----------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------->
<!--                                           MENU  - PANEL DE ADMIN                                            -->
<!----------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------->

<nav>
    <!------------------------------------------------------->
    <!----------------------BOTON MENU----------------------->

    <input class="menu-btn" type="checkbox" id="menu-btn"/>
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
            <li onclick="menucerrar()" id="inicio_panel_admin"><a href="admin_panel.php"><img id="icono_home_admin" src="images/icons/menu_panel/home_icon.png" alt="icono inicio admin">Panel</a></li>
            <li onclick="menucerrar()" id="gestion_clientes"><a href="admin_management.php"><img id="icono_gestion_clientes" src="images/icons/menu_panel/admin-clientes_icon.png" alt="icono gestion clientes">Gestionar Clientes</a></li>
            <li onclick="menucerrar()" id="consult"><a href="admin_consultas.php"><img id="icono_gestion_consultas" src="images/icons/menu_panel/admin-consultas_icon.png" alt="icono gestion consultas">Consultas</a></li>
            <li onclick="menucerrar()"><a class="btn_logout" type="button" data-toggle="modal" data-target="#panelsesion"><img id="icono_cerrar_sesion" src="images/icons/menu_panel/logout_icon.png" alt="icono cerrar sesion">CERRAR SESIÓN</a></li>

            <!----------------Footer Menu----------------->
            <!--<li><footer> <i class="fas fa-user-circle"></i> <span class="usuario"> Joseba Jimenez </span></footer></li>-->
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
