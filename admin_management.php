<?php
$t = 4;
$name = "Panel Admin - Gestión de Clientes";
include_once './includes/header.php';

//--------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------HEADER DE LA PÁGINA----------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------//

function customHead(){?>

    <!-----------------------------------------BOOSTRAP--------------------------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!------------------CSS-------------------->
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="css/adminManagement-style.css">

<?php }
?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<body>


<!-------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------MENU------------------------------------------------------------>
<script>
    var removeMe = document.getElementById("gestion_clientes");
    removeMe.innerHTML = '';
</script>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- POPUP CERRAR SESION--------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/panelsesion.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------CONTENIDO GESTION DE CLIENTES-------------------------------------------->

<section>

    <div id="contenido_gestion_clientes">
        <h1 class="banner">GESTIÓN DE CLIENTES</h1>

        <!---------------------------------------------------------------------------------------->
        <!--------------------------------------BUSQUEDA------------------------------------------>


        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control search" id="input_buscar" placeholder="Buscar" onkeyup="buscarUsuario()">

            <!---------------------------------------------------------->
            <!-------------BOTONES GESTIÓN DE CLIENTES PC--------------->

            <div class="botones_gestion-clientes-desktop" id="botones_gestion-clientes_desktop">
                <button class="boton_dar_de_alta_desktop" onclick="abrirPopUp()">
                    <img src='images/icons/gestion_clientes/add-user_icon.png' id='icono_boton_dar_alta_usuario'>
                    <p>DAR DE ALTA</p>
                </button>

                <button class="boton_dar_de_baja_desktop" onclick="activarDeleteUsuario() , removeBotonesGestionDesktop()">
                    <img src='images/icons/gestion_clientes/delete-user_icon.png' id='icono_boton_dar_baja_usuario'>
                    <p>DAR DE BAJA</p>
                </button>
            </div>

            <div id="boton_cancelar_baja_desktop">
                <button class="boton_cancelar_baja desktop" onclick="desactivarDeleteUsuario(), appearBotonesGestionDesktop()">
                    <p id="text_boton_cancelar_desktop">Salir de DAR DE BAJA</p>
                </button>
            </div>
        </div>


        <!---------------------------------------------------------------------------------------->
        <!---------------------------------LISTADO DE USUARIOS------------------------------------>

        <div class="listado">

            <!-------------------------------------------------------------->
            <!-----------------------Header listado------------------------->
            <div class="listado-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                    <tr>
                        <th class="listado_icono-cuenta" </th>
                        <th class="listado_cliente">Cliente</th>
                        <th class="listado_DNI" id="listado_DNI">DNI</th>
                        <th class="listado_tipo" id="listado_tipo">Tipo</th>
                        <th class="listado_sensores">Nº Sensores</th>
                        <th class="listado_botones"></th>
                        <th class="listado_botones"></th>
                        <th class="delete_usuario_th"></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="listado_contenido scrollbar_table" >
                <!------------------------------------------------------------->
                <!--------------Aviso de Usuario no existente------------------>
                <table cellpadding="0" cellspacing="0" border="0" id="sin_resultados">
                    <tbody>
                    <tr>
                        <td cellpadding="0" cellspacing="0" border="0">
                            <i class="fas fa-user-alt-slash fa-5x"></i>
                            <p id="sin_resultados-texto1">Sin resultados</p>
                            <p id="sin_resultados-texto2">Parece que el usuario que busca no existe.</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!------------------------------------------------------------->
                <!---------------------Listado Usuarios------------------------>
                <table cellpadding="0" cellspacing="0" border="0" id="tabla">
                    <tbody id="tablaUsers">
                    </tbody>
                </table>
            </div>
        </div>

        <!---------------------------------------------------------------------------------------->
        <!-------------------------BOTONES GESTION CLIENTES MOBILE-------------------------------->

        <div class="botones_gestion-clientes_mobile" id="botones_gestion-clientes_mobile">
            <button class="boton_dar_de_alta" onclick="abrirPopUp()">
                <img src='images/icons/gestion_clientes/add-user_icon.png' id='icono_boton_dar_alta_usuario'>
                <p>DAR DE ALTA</p>
            </button>

            <button class="boton_dar_de_baja" onclick="activarDeleteUsuario(), removeBotonesGestionMobile()">
                <img src='images/icons/gestion_clientes/delete-user_icon.png' id='icono_boton_dar_baja_usuario'>
                <p>DAR DE BAJA</p>
            </button>
        </div>

        <div id="boton_cancelar_baja_mobile">
            <button class="boton_cancelar_baja" onclick="desactivarDeleteUsuario(), appearBotonesGestionMobile()">
                <p>Salir de DAR DE BAJA</p>
            </button>
        </div>

    </div>

    <!-------------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------FORMULARIO DAR DE ALTA---------------------------------------------------->

    <div id="panel_dar_alta" class="popup-formulario">

        <!------------------------------------------------------------->
        <!--------------------Header Formulario------------------------>
        <div class="header_panel_dar_alta">
            <h1 id="titulo_dar_alta">DAR DE ALTA</h1>
            <img id="icono_cerrar" src="images/landing_page/close.png" onclick="cerrarPopUp()">
        </div>
        <!------------------------------------------------------------->
        <!------------------------Formulario--------------------------->
        <div id="content-form-box" class="box scrollbar_form">
            <div class="headsection_formulario">
                <p>Introduce los datos del usuario que quieres dar de alta.</p>
            </div>
            <form id="form_dar_alta">
                <div id="datos_formulario_alta1">
                    <!-----------------Nombre---------------------->
                    <div class="text_label form-group">
                        <label for="nombre" class="colocar_nombre">Nombre:</label>
                        <input type="text" name="introducir_nombre" id="nombre" placeholder="Escribe el nombre" required maxlength="30" minlength="3">
                    </div>
                    <!-----------------Apellidos------------------->
                    <div class="text_label form-group">
                        <label for="apellidos" class="colocar_apellidos">Apellidos:</label>
                        <input type="text" name="introducir_apellidos" id="apellidos" placeholder="Escribe los apellidos"  required maxlength="60"  minlength="3">
                    </div>
                </div>
                <div id="datos_formulario_alta2">
                    <!--------------------DNI---------------------->
                    <div class="text_label form-group">
                        <label for="DNI" class="colocar_DNI"><i class='fas fa-id-card' id="iconos_dar_alta"></i>DNI:</label>
                        <input type="text" name="introducir_DNI" id="DNI" placeholder="Escribe el DNI" maxlength="8"   required minlength="8">
                    </div>
                    <!-------------------Correo-------------------->
                    <div class="text_label form-group">
                        <label for="correo" class="colocar_correo"><i class="bi bi-envelope-fill" id="iconos_dar_alta" ></i>Correo:</label>
                        <input type="correo" name="introducir_correo" id="correo" placeholder="Escribe el correo" required maxlength="50"  minlength="5">
                    </div>
                </div>
                <div id="datos_formulario_alta3">
                    <!-------------------Telefono-------------------->
                    <div class="text_label form-group">
                        <label for="telefono" class="colocar_telefono"><i class="bi bi-telephone-fill" id="iconos_dar_alta" ></i>Teléfono:</label>
                        <input type="number" name="introducir_telefono" id="telefono" placeholder="Escribe el nº de teléfono"  required maxlength="9"  minlength="9">
                    </div>
                    <!-------------------Dirección-------------------->
                    <div class="text_label form-group">
                        <label for="dirección" class="colocar_direccion"><i class="bi bi-geo-alt-fill" id="iconos_dar_alta"></i>Dirección:</label>
                        <input type="text" name="introducir_direccion" id="direccion" placeholder="Escribe la dirección"  required maxlength="255"  minlength="5">
                    </div>
                </div>
                <div id="datos_formulario_alta4">
                    <!--------------Nombre de la cuenta---------------->
                    <div class="text_label form-group" id="container_label_nombre_cuenta">
                        <label for="cuenta" class="colocar_nombre_cuenta"><i class='fas fa-user-circle' id="iconos_dar_alta"></i>Nombre de la cuenta:</label>
                        <input type="text" name="introducir_cuenta" id="username" placeholder="Escribe el nombre de la cuenta" required maxlength="255"  minlength="5">
                    </div>
                </div>
                <div id="datos_formulario_alta5">
                    <!-------------------Contraseña--------------------->
                    <div class="text_label form-group">
                        <label for="contraseña" class="colocar_contraseña"><i class="fas fa-key" id="iconos_dar_alta"></i>Introduce una contraseña:</label>
                        <input type="password" name="introducir_contraseña" id="contraseña" placeholder="Escribe una contraseña" required maxlength="255">
                    </div>

                    <!--------------Confirmar Contraseña---------------->
                    <!--<div class="text_label form-group">
                        <label for="contraseña_confirmar" class="colocar_contraseña_confirmar"><i class="fas fa-key" id="iconos_dar_alta"></i>Repite la contraseña:</label>
                        <input type="password" name="introducir_contraseña_confirmar" id="contraseña_confirmar" placeholder="Escribe otra vez la contraseña"  required maxlength="255">
                    </div>
                    -->
                </div>
                <div id="datos_formulario_alta6">
                    <div class="text_label form-group" id="container_label_tipo_cuenta">
                        <label for="tipo_usuario" class="colocar_tipo_usuario"><i class="bi bi-person-badge-fill" id="iconos_dar_alta"></i>Tipo de cuenta:</label>
                        <select id="tipo_usuario" name="cuenta" required>
                            <option value="USER">Particular</option>
                            <option value="COMPANY">Corporativa</option>
                            <option value="ADMIN">Administrador</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="enviar_formulario" class="submit">AÑADIR USUARIO</button>
            </form>
        </div>

</section>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- POPUP CERRAR SESION--------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/panelsesion.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- POPUP CONFIRMAR DAR DE BAJA------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<div class="modal" id="panelAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo1">VAS A DAR DE BAJA A UN CLIENTE</h5>
                    
                </div>
                <div class="modal-body">
                    <p id="texto1">
                        ¿Estás seguro de que quieres eliminar a este usuario?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="deleteUser()" class="boton" data-toggle='modal' data-target='#panelInformar'data-dismiss="modal">SI</button>
                    <button type="button" class="boton" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- CONFIRMACION FINAL------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="panelInformar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" id="confirmacion_final">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo1">CONFIRMADO</h5>
                </div>
                <div class="modal-body">
                    <p id="texto1">
                    El usuario ha sido eliminado
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="boton" data-dismiss="modal">cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------FOOTER-------------------------------------------------------->

<?php include_once './includes/footer.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------SCRIPTS------------------------------------------------------->

<!--------------------------------------------------------------------------------------->
<!-------------------------------Cerrar Sesion------------------------------------------->
<script src="./js/closeSession.js"></script>
<script src="./js/checkAdminLogin.js"></script>
<!--------------------------------------------------------------------------------------->
<!------------------------------Buscar Usuario------------------------------------------->
<script>
    function buscarUsuario() {
        var input, filter, table, tr, td, i, txtValue, notFound;

        input = document.getElementById("input_buscar");
        filter = input.value.toUpperCase();
        table = document.getElementById("tablaUsers");
        tr = table.getElementsByClassName("tr_user");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    /*---------------------------------------------------------------------------------------*/
    /*------------------------------Rellenar Tabla-------------------------------------------*/

    window.addEventListener("load", function(){
        fetch("./api/v1/customer", {
            method: "GET"
        }).then(function (result) {
            if(result.ok) return result.json();
        }).then(function (data) {
            if(data != null){
                for (let i = 0; i < data.length; i++) {
                    const e = data[i];
                    tablaUsers.innerHTML +=
                        "<tr class='tr_user'>" +
                        "<td class='listado_icono-cuenta'><i class='fas fa-user-circle' id='user'></i></td>" +
                        "<td class='listado_cliente'>" + e.name + " " + e.surname + "</td>"+
                        "<td class='listado_DNI' id='listado_DNI'>"+ e.dni +"</td>" +
                        "<td class='listado_tipo' id='listado_tipo'>" + translateType(e.type) + "</td>" +
                        "<td class='listado_sensores'>" + e.qtyProbes + "</td>" +
                       // "<td class='listado_botones'><button id='boton_perfil'><i class='fas fa-id-card' id='icono_boton_perfil'></i></button></td>" +
                        "<td class='listado_botones' ><button  id='boton_mapa' onclick='showUserField(\"" + e.username + "\")'><img src='images/icons/gestion_clientes/map_customer_icon.png' id='icono_boton_mapa' ></button></td>" +
                        "<td class='delete_usuario_td'><button data-toggle='modal' data-target='#panelAlert'><i class='bi bi-trash-fill'></i></button></td></tr>"
                }
            }
        });
    });

    /*-------------------------------------------------------*/
    /*----------------ShowUserField--------------------------*/

    function showUserField(username){
        window.open("./user_panel.php?viewAsUser=" + username, '_blank').focus();
    }

    /*-------------------------------------------------------*/
    /*----------------TranslateTYPE--------------------------*/
    function translateType(type){
        if(type == "COMPANY"){
            return "Corporativa";
        }
        else{
            return "Particular";
        }
    }

</script>
<!----------------------------------------------------------------------------------------------->
<!------------------------------------ Funcion PopUp -------------------------------------------->
<script>
    function abrirPopUp() {
        document.getElementById("contenido_gestion_clientes").style.display = "none";
        document.getElementById("panel_dar_alta").style.display = "block";
    }
    function cerrarPopUp() {
        document.getElementById("panel_dar_alta").style.display = "none";
        document.getElementById("contenido_gestion_clientes").style.display = "";
    }
</script>
<!----------------------------------------------------------------------------------------------->
<!---------------------------------- Funciones Dar de Baja -------------------------------------->
<script>
    function activarDeleteUsuario(){

        /*----Desaparecen los botones----*/
        var listadoBotones = document.getElementsByClassName('listado_botones');
        for (var i=0;i< listadoBotones.length;i+=1){
            listadoBotones[i].style.display = 'none';
        }

        /*----Aparición del th----*/
        var cabeceraDelete = document.getElementsByClassName('delete_usuario_th');
        for (var i=0;i< cabeceraDelete.length;i+=1){
            cabeceraDelete[i].style.display = 'table-cell';
        }

        /*----Aparición de los botones delete en cada fila----*/
        var botonesDelete = document.getElementsByClassName('delete_usuario_td');
        for (var i=0;i< botonesDelete.length;i+=1){
            botonesDelete[i].style.display = 'table-cell';
            botonesDelete[i].style.animation = 'slide-in 0.75s forwards';
        }

    }

    function desactivarDeleteUsuario(){

        /*----Aparecen los botones----*/
        var listadoBotones = document.getElementsByClassName('listado_botones');
        for (var i=0;i< listadoBotones.length;i+=1){
            listadoBotones[i].style.display = 'table-cell';
        }


        /*----Desaparicion del th----*/
        var cabeceraDelete = document.getElementsByClassName('delete_usuario_th');
        for (var i=0;i< cabeceraDelete.length;i+=1){
            cabeceraDelete[i].style.display = 'none';
        }

        /*----Desaparicion de los botones delete en cada fila----*/
        var botonesDelete = document.getElementsByClassName('delete_usuario_td');
        for (var i=0;i< botonesDelete.length;i+=1){
            botonesDelete[i].style.display = 'none';
        }
    }

    function removeBotonesGestionMobile(){
        /*----Desaparcicion de los botones de gestion----*/
        document.getElementById('botones_gestion-clientes_mobile').style.display = 'none'

        /*----Aparicion boton cancelar----*/
        document.getElementById('boton_cancelar_baja_mobile').style.display='table'
        document.getElementById('boton_cancelar_baja_mobile').style.animation='anim .4s ease-in-out'
    }

    function removeBotonesGestionDesktop(){
        /*----Desaparcicion de los botones de gestion----*/
        document.getElementById('botones_gestion-clientes_desktop').style.display = 'none'

        /*----Aparicion boton cancelar----*/
        document.getElementById('boton_cancelar_baja_desktop').style.display='table'
        document.getElementById('boton_cancelar_baja_desktop').style.animation='anim .4s ease-in-out'
    }

    function appearBotonesGestionMobile(){
        /*----Aparicion de los botones de gestion----*/
        document.getElementById('botones_gestion-clientes_mobile').style.display = 'flex'
        document.getElementById('botones_gestion-clientes_mobile').style.animation='anim .5s ease-in-out'

        /*----Desaparicion boton cancelar----*/
        document.getElementById('boton_cancelar_baja_mobile').style.display='none'
    }

    function appearBotonesGestionDesktop(){
        /*----Aparicion de los botones de gestion----*/
        document.getElementById('botones_gestion-clientes_desktop').style.display = 'flex'
        document.getElementById('botones_gestion-clientes_desktop').style.animation='anim .5s ease-in-out'

        /*----Desaparicion boton cancelar----*/
        document.getElementById('boton_cancelar_baja_desktop').style.display='none'
    }

</script>
<script src="./js/adminCustomer.js"></script>
<!----------------------------------------------------------------------------------------------->
<!---------------------------- Separate Popper and Boostrap JS ---------------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!-------------------------------------------------------------------------------------------------------------------->

</body>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FIN BODY DE LA PÁGINA ------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------->