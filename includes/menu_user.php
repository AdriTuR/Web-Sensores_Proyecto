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
    <div class="sidebar">
        <ul>
            <li>
                <header> PANEL DE USUARIO </header>
                <hr class="line_panel">
            </li>
            <li onclick="menucerrar()" id="userpanel"><a href="user_panel.php"><img id= "iconomapainteractivo" src="images/landing_page/interactive-map_icon.png" alt="icono de un mapa interactivo"></i>TERRENOS</a></li>
            <li onclick="menucerrar()" id="userprofile"><a href="user_profile.php"><i class="bi bi-person-fill"></i>PERFIL</a></li>
            <li onclick="menucerrar()" id="userconsult"><a href="" data-toggle="modal" data-target="#consulta"><i class="fas fa-clipboard"></i>CONSULTAR</a></li>
            <li onclick="menucerrar()"><a class="btn_logout" type="button" data-toggle="modal" data-target="#panelsesion"><i class="bi bi-box-arrow-right"></i>CERRAR SESIÓN</a></li>

            <li id="usuario"><hr class="line_panel"><a><i class="fa fa-user-circle fa-2x" aria-hidden="true" ></i>USUARIO</a></li>
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
