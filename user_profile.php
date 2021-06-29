<?php
$t = 5;
$name = "Panel Usuario - Perfil";
include_once './includes/header.php';

//--------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------HEADER DE LA PÁGINA----------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------//
function customHead(){?>

    <!-----------------------------------------BOOSTRAP--------------------------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!------------------CSS-------------------->
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="./css/user_profile-style.css">

<?php }
?>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------MENU------------------------------------------------------------>
<script>
    var removeMe = document.getElementById("userprofile");
    removeMe.innerHTML = '';
</script>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- POPUP CERRAR SESION--------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/panelsesion.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------CONTENIDO PERFIL DE USUARIO------------------------------------------------>

<section>

    <!------------------------------------------------------>
    <!-------------------BACKGROUND------------------------->

    <div class="background_perfil">
        <img id="icono_usuario" src="./images/user_panel/user_icon.png" alt="icono de un usuario">
    </div>

    <!----------------------------------------------------------------------------------------------------------->
    <!-----------------------------------------------DATOS DE USUARIO-------------------------------------------->

    <div class="contenedor_datos_usuario">

        <!------------------------------------------------------------------------>
        <!---------------------DATOS 1 (Nombre de usuario)------------------------>

        <div id="contenedor1">
            <div id="cont1">
                <p id="nombre"></p>
            </div>
        </div>

        <!------------------------------------------------------------------------>
        <!--------------------------BANNER TITULO--------------------------------->

        <h1 class="banner">DATOS PERSONALES</h1>

        <!------------------------------------------------------------------------>
        <!------------------DATOS 2 (Nombre, Apellido, DNI)----------------------->

        <div id="cont2">
            <div id="contenedor2">

                <!----------------------Nombre---------------------->
                <div class="datos_personales">
                    <p class="texto1 inline">Nombre:</p>
                    <p id="nombre2" class="datos"></p>
                </div>
                <!--------------------Apellidos---------------------->
                <div class="datos_personales">
                    <p class="inline texto1">Apellidos:</p>
                    <p id="apellidos" class="datos"></p>
                </div>
                <!------------------------DNI------------------------>
                <div class="datos_personales">
                    <p class="texto1 inline"><i class="fas fa-address-card"></i>DNI:</p>
                    <p id="dni" class="datos"></p>
                </div>
            </div>

            <hr class="line_perfil1">
            <hr class="line_perfil2"></hr>

            <!------------------------------------------------------------------------>
            <!----------------DATOS 3 (Direccion, Correo, Telefono)------------------->

            <div id="contenedor3">

                <div class="datos_personales">
                    <p class="inline texto1"><i class="fas fa-map-marker-alt"></i>Dirección:</p>
                    <p id="direccion" class="datos editable"></p>
                    <!--<p class="inline editable texto1"></p></p>-->
                </div>
                <div class="datos_personales">
                    <p class="texto1 inline"><i class="fas fa-envelope"></i>Correo:</p>
                    <p id="correo" class="datos editable"></p>
                    <!--<p class="inline editable texto1">.</p>-->
                </div>
                <div class="datos_personales">
                    <p class="texto1 inline"><i class="fas fa-phone-alt"></i>Teléfono: </p>
                    <p id="telefono" class="datos editable"></p>
                    <!---<p class="inline editable texto1">.</p>-->
                </div>


                <!---------Boton editar--------->
                <!--<button id="boton_editar" onclick="editacion()">
                   <i class="bi bi-pencil-square" id="icono_editar"></i>
               </button>-->

            </div>


            <hr class="line_perfil1">
            <hr class="line_perfil2"></hr>

            <!------------------------------------------------------------------------>
            <!----------------DATOS 4 (Fecha registro, Sensores)---------------------->

            <div id="contenedor4">

                <div class="datos_personales">
                    <p class="texto1 inline registro"><i class="fas fa-calendar-alt"></i>Fecha de registro:</p>
                    <p id="registro" class="datos"></p>
                </div>

                <div class="datos_personales">
                    <p class="texto1 inline sensores"><i class="fas fa-microchip"></i>Nº de sensores:</p>
                    <p id="sensores" class="datos"></p>
                </div>

            </div>
        </div>
    </div>

    <!----------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------->
    <!-- Panel Consulta -->
    <div class="modal" id="consulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="HCons">CONSÚLTANOS</h5>

                    <hr class="line">

                </div>

                <div class="modal-body">
                    <p id="CT1">Ponte en contacto con nosotros y atenderemos tu consulta en un plazo de 24 horas</p>
                    <select id="tipo_consulta">
                        <option value="solicitar_sensores">Solicitar sensores</option>
                        <option value="modificar_terrenos">Modificar terrenos/parcelas</option>
                        <option value="problemas_cuenta">Problemas con la cuenta</option>
                        <option value="problemas_sensores">Problemas con los sensores</option>
                        <option value="otro">Otro</option>
                    </select>

                    <form id="form_consult">
                        <p class="modal-labels">Escribe tu consulta:</p>
                        <textarea id="respuesta"></textarea>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="enviar_formulario" id="enviar" class="btn btn-primary">ENVIAR</button>
                </div>

            </div>
        </div>
    </div>

</section>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- FOOTER DE LA PÁGINA -------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/footer.php';?>

<!-------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------- SCRIPTS ------------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------Login-------------------------------------------->
<script>
    let username;

    window.addEventListener("load", async function(){
        await fetch("./api/v1/session", {
            method: "GET"
        }).then(function (result) {
            if(result.ok){
                return result.json();
            }else{
                location.href = "./login.php";
            }
        }).then(function (data) {
            username = data.name;
        });

        await fetch("./api/v1/customer/" + username, {
            method: "GET"
        }).then(function (result) {
            if(result.ok) return result.json();
        }).then(function (data) {
            if(data != null){
                nombre.innerHTML = data[0].name;
                nombre2.innerHTML += data[0].name;
                apellidos.innerHTML += data[0].surname;
                dni.innerHTML += data[0].dni;
                direccion.innerHTML += data[0].address;
                correo.innerHTML += data[0].email;
                telefono.innerHTML += data[0].phone;
                registro.innerHTML += data[0].registerDate;
                sensores.innerHTML += data[0].qtyProbes;
            }
        });
    });

    <!--------------------------------------Edición-------------------------------------------->
    function editacion(){
        var editables = document.getElementsByClassName("editable")
        var boton = document.getElementById("boton_editar")

        for(var i = 0;i<editables.length;i++){
            /*si el contenido ya es editable se activa esto*/
            if(editables[i].isContentEditable){
                editables[i].contentEditable = false
                boton.innerHTML = "<i class='bi bi-pencil-square'>";
                if(editables[i].innerHTML == "Haga click aqui para editar la informacion"){
                    editables[i].innerHTML = ""
                }
            }
            /*si el contenido no es editable se activa esto */
            else{
                editables[i].contentEditable = true
                editables[i].innerHTML = "Haga click aqui para editar la informacion";
                boton.innerHTML = "<div class='boton-confirmar'>CONFIRMAR</div>";
            }
        }
    }
</script>
<!-------------------------------Cerrar Sesion------------------------------------------->
<script src="./js/closeSession.js"></script>
<!-------------------------------------------------------------------------------------------------------------------->
<!---------------------------- Separate Popper and Boostrap JS ---------------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!-------------------------------------------------------------------------------------------------------------------->

</body>


<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->