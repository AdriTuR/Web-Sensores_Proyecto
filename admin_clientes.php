<?php
$t = 2;
$name = "Panel de admin, seccion de clientes";
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
<input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars menuIcon" id="btn"></i>
        <i class="fas fa-times menuIcon" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header> PANEL DE ADMIN </header>   
    <ul>
        <li><a href="#"><i class="fas fa-home"></i>Panel</a></li>
        <li><a href="#"><i class="fas fa-tractor"></i>Gestionar Parcelas</a></li>
        <li><a href="admin_consultas.php"><i class="fas fa-comment-alt"></i>Consultas</a></li>
        <li><a class="btn_logout" type="button" onclick="disconnect()"><i class="fas fa-sign-out-alt"></i>CERRAR SESIÓN</a></li>
    </ul>
<h1 class="banner"><img src="./images/admin_general/user-gestion_icon.png" alt="imagen usuario gestion">Clientes</h1>


</div>  
<script>
window.addEventListener("load", function(){
  fetch("./api/v1/", {
    method: "GET"
  }).then(function (result) {
    if(result.status == 200){
      return result.json();
    }
  }).then(function (data) {
    if(data != null){
      if(data.role == "USER"){
        location.href = "./user_panel.php";
      }
    }
  });
});
</script>
<!--  FORMULARIO DAR DE ALTA  -->
<div class="popup-formulario" id="formulario_contacto">
            <div class="box" id="box-contacto">
                <div id="header-box">
                    <img src="images/landing_page/close_icon3png.png" alt="cerrar formulario" width="40px" height="40px" class="cerrar-formulario" onclick="cerrarFormulario()">
                    <h1 id="title">DAR DE ALTA</h1>
                </div>
                <div id="content-form-box">
                    <form id="form_contact">
                        <p>
                            <label for="nombre" class="colocar_nombre">Nombre:</label>
                            <input type="text" name="introducir_nombre" id="nombre" placeholder="Escribe tu nombre" required maxlength="30" minlength="3">
                        </p>
                        <p>
                            <label for="apellidos" class="colocar_apellidos">Apellidos: </label>
                            <input type="text" name="introducir_apellidos" id="apellidos" placeholder="Escribe tus apellidos" maxlength="60" required  minlength="3">
                        </p>
                        <p>
                            <label for="DNI" class="colocar_DNI">DNI:</label>
                            <input type="DNI" name="introducir_DNI" id="DNI" placeholder="Escribe tu DNI" required pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra">
                        </p>
                        <p>
                            <label for="correo" class="colocar_correo">Correo: </label>
                            <input type="mail" name="introducir_correo" id="correo" required placeholder="Escribe tu correo" maxlength="60"  minlength="3">
                        </p>
                        <p>
                            <label for="telefono" class="colocar_telefono">Telefono: </label>
                            <input type="number" name="introducir_telefono" id="telefono" required placeholder="Escribe tus apellidos" maxlength="60"  minlength="3">
                        </p>
                        <p>
                            <label for="nombre_cuenta" class="colocar_nombre_cuenta">Nombre de la cuenta:</label>
                            <input type="text" name="introducir_nombre_cuenta" id="nombre_cuenta" placeholder="Escribe tu nombre de la cuenta" required maxlength="30" minlength="3">
                        </p>
                        <p>
                            <label for="contraseña" class="colocar_contraseña">Contraseña:</label>
                            <input type="password" name="introducir_contraseña" id="contraseña" placeholder="Escribe tu contraseña" required maxlength="30" minlength="3">
                        </p>
                        <p>
                            <label for="cuenta" class="colocar_cuenta">Tipo de cuenta:</label>
                            <br>
                            <select id="cuenta">
                              <option value="Usuario">Usuario</option>
                              <option value="Corporativa">Corporativa</option>
                            </select>
                        </p>
                       
                        <button type="submit" name="enviar_formulario" id="enviar"><a>ENVIAR</a></button>
                    </form>
                    <script src=""></script>
                </div>
            </div>
        </div>
<!--             TABLA                   -->
<!--  -------------------------------    -->
<?php 
$conn = mysqli_connect("localhost","root","","grupo9");
if($conn-> connect_error) {
  die("Connection failed".$conn);
}
$query = "SELECT id, username, role from user";
$result=mysqli_query($conn,$query);
?>
<div class="container" id="container_lista">

<div id="lista_contener">
<input class="form-control" id="myInput" type="text" placeholder="Buscar.."> 


<br>

<table class="table table-bordered " id="tabla">
<thead>
<tr>
<th>Usuario</th>
<th>DNI</th>
<th>Tipo</th>


</tr>
</thead>
<tbody id="myTable">
<?php     
 while($rows=mysqli_fetch_assoc($result)){
  ?>
  <tr>
 
  <td><img  src="./images/admin_general/usuario.png"><?php echo $rows['username']?></td>
  <td><?php echo $rows['id'] ?></td>
  <td><?php echo $rows['role'] ?></td>
  <td class="eliminar_casilla" id="eliminar-casilla"><button class="eliminar" id="eliminar_boton"><i class="fas fa-trash-alt"></i></button></td>
  
  </tr>
 <?php
 
 }

?>
</tbody>
</table>
</div>
<!-- CODIGO DE BUSCAR EN TABLA -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!-- BOTONES DE DAR DE ALTA O DE BAJA -->
  <div class="container_opciones" id="container_opciones">
    <div class="dar_alta" onclick="abrirFormulario()"><i class="fas fa-user-plus"></i><br>DAR DE ALTA</div>
    <div class="dar_alta" id="baja_boton"onclick="baja()" ><i class="fas fa-user-minus"></i>DAR DE BAJA</div>
  </div>
 
</body>
<script>
 function abrirFormulario() {
                document.getElementById("lista_contener").style.display = "none";
                document.getElementById("container_opciones").style.display = "none";
                document.getElementById("formulario_contacto").style.display = "flex";
                document.getElementById("body").style.overflow = "hidden";
                document.body.style.filter = "blur(8px)";
                
            }
  function cerrarFormulario() {
                document.getElementById("lista_contener").style.display = "block";
                document.getElementById("container_opciones").style.display = "flex";
                document.getElementById("formulario_contacto").style.display = "none";
                document.getElementById("body").style.overflow = "scroll";
                document.getElementById("contenido call_to_action").style.filter = "none";
                document.getElementById("boton_abajo").style.display = "flex";
                document.getElementById("menu-btn").disabled = false;
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
<?php include_once './includes/footer.php';?>
</html>