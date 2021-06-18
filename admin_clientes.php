<?php
$t = 4;
$name = "Panel Administrador - Gestión de Clientes";
include_once './includes/header.php'; 
function customHead(){?>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./css/adminc-style.css" />
  <link rel="stylesheet" href="./css/panelMenu-style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <?php }
  ?>
  <body>
  <h1 class="banner">GESTIÓN DE CLIENTES</h1>
  <!--  FORMULARIO DAR DE ALTA  -->
  <div class="popup-formulario" id="formulario_contacto">
  <div class="box" id="box-contacto">
  <div id="header-box">
  <img src="images/landing_page/close_icon3png.png" alt="cerrar formulario" width="40px" height="40px" class="cerrar-formulario" onclick="cerrarFormulario()">
  <div class="titulo_morado"><h1 id="title">DAR DE ALTA</h1></div>
  </div>
  <div id="content-form-box">

  <form id="form_contact">
    <p>
    <label for="nombre" class="colocar_nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" placeholder="Escribe nombre" required maxlength="30" minlength="3">
    </p>
    <p>
    <label for="apellidos" class="colocar_apellidos">Apellidos: </label>
    <input type="text" name="apellidos" id="apellidos" placeholder="Escribe apellidos" maxlength="60" required  minlength="3">
    </p>
    <p>
    <label for="DNI" class="colocar_DNI">DNI:</label>
    <input type="DNI" name="DNI" id="DNI" placeholder="Escribe tu DNI" required pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra">
    </p>
    <p>
    <label for="correo" class="colocar_correo"><i class="fas fa-envelope"></i>Correo: </label> 
    <input type="mail" name="correo" id="correo" required placeholder="Escribe correo" maxlength="60"  minlength="3">
    </p>
    <p>
    <label for="telefono" class="colocar_telefono"><i class="fas fa-phone-alt"></i>Telefono: </label>
    <input type="number" name="telefono" id="telefono" required placeholder="Escribe apellidos" maxlength="60"  minlength="3">
    </p>
    <p>
    <label for="nombre_cuenta" class="colocar_nombre_cuenta"><i class="fas fa-user-circle"></i>Nombre de la cuenta:</label>
    <input type="text" name="nombre_cuenta" id="nombre_cuenta" placeholder="Escribe nombre de la cuenta" required maxlength="30" minlength="3">
    </p>
    <p>
    <label for="contraseña" class="colocar_contraseña"><i class="fas fa-key"></i>Contraseña:</label>
    <input type="password" name="contraseña" id="contraseña" placeholder="Escribe contraseña" required maxlength="30" minlength="3">
    </p>
    <p>
    <label for="cuenta" class="colocar_cuenta"><i class="fas fa-id-badge"></i>Tipo de cuenta:</label>
    <br>
    <select name="cuenta">
      <option value="USER">Usuario</option>
      <option value="COMPANY">Corporativa</option>
    </select>
    </p>
    
    <button type="submit" name="enviar_formulario" id="enviar"><a>ENVIAR</a></button>
  </form>
  </div>
  </div>
  </div>
  <!--             TABLA                   -->
  <!--  -------------------------------    -->
  <div class="container" id="container_lista">
  
  <div id="lista_contener">
    <div class="form-group has-search">
      <span class="fa fa-search form-control-feedback"></span>
      <input type="text" class="form-control search" id="input_buscar" placeholder="Buscar usuario..." onkeyup="buscarUsuario()">
    </div>
      <br>
      <table class="table table-bordered" id="tabla">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>DNI</th>
          <th>Tipo</th>
        </tr>
      </thead>
      <tbody id="myTable" name="myTable">
        <!-- 
      <tr id="sinResultado" style="display:none">
        <td>no hay resulstados</td>
        </tr>
      -->
      </tbody>
      </table>
      </div>

  <!-- BOTONES DE DAR DE ALTA O DE BAJA -->
        <div class="container_opciones" id="container_opciones">
          <div class="dar_alta" onclick="abrirFormulario()"><i class="fas fa-user-plus"></i><br>DAR DE ALTA</div>
          <div class="dar_alta" id="baja_boton"onclick="baja()" ><i class="fas fa-user-minus"></i>DAR DE BAJA</div>
      </div>
    </div>
    <?php include_once './includes/footer.php';?>
  </body>
  
  <script>
  function buscarUsuario() {
    var input, filter, table, tr, td, i, txtValue, notFound;

    input = document.getElementById("input_buscar");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    //notFound = document.getElementById("sinResultado")
 
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
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

  function abrirFormulario() {
    document.getElementById("lista_contener").style.display = "none";
    document.getElementById("container_opciones").style.display = "none";
    document.getElementById("formulario_contacto").style.display = "flex";
  }

  function cerrarFormulario() {
    document.getElementById("lista_contener").style.display = "block";
    document.getElementById("container_opciones").style.display = "flex";
    document.getElementById("formulario_contacto").style.display = "none";
  }

  function baja(){
    var x = document.querySelectorAll(".eliminar_casilla");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "block";
    }
    document.getElementById("baja_boton").onclick = bajacerrar;
  }

  function bajacerrar(){
    var x = document.querySelectorAll(".eliminar_casilla");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById("baja_boton").onclick = baja;
  }  
  </script>

  <script>
    var removeMe = document.getElementById("gestion_clientes");
    removeMe.innerHTML = '';
  </script>

  <!------------------CERRAR SESIÓN----------------------->
  <script src="./js/closeSession.js"></script>
  <script src="./js/adminCustomer.js"></script>
  <script src="./js/checkAdminLogin.js"></script>
</html> 