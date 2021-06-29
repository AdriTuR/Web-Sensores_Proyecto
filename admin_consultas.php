<?php
$t = 4;
$name = "Panel Admin";
include_once './includes/header.php';

function customHead(){?>
    <link rel="stylesheet" href="./css/adminInquiries-style.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<?php }
?>
<body>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- POPUP CERRAR SESION--------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/panelsesion.php';?>


<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- POPUP CONFIRMACIÓN--------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<?php include_once './includes/confirm.php';?>
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<section class="conjunto">

    <script>
        var removeMe = document.getElementById("consult");
        removeMe.innerHTML = '';
    </script>

<h1 class="banner">CONSULTAS</h1>

<!--             TABLA                   -->
<!--  -------------------------------    -->
<div class="container" id="container_lista">

<div id="lista_contener">
    <div id="filtroboton">
        <form id=Cfiltro>
            <select id="selectComparation">
                <option>Todas las consultas</option>
                <option>Consultas sin leer</option>
                <option>Consultas de hoy</option>
                <option>Usuarios no registrados</option>
                <option>Usuarios registrados</option>
                <option>Solicitar sensores</option>
                <option>Modificar terrenos/parcelas</option>
                <option>Problemas con la cuenta</option>
                <option>Problemas con los sensores</option>
            </select>
        </form>

        <button id="refresh" onClick="updateList()">
            <i class="fas fa-sync fa-1.5x"></i>
        </button>
    </div> 

<div class="scrollbar_table">
<table class="table table-bordered" id="tablacons">
    <tbody id="myTable2">
    </tbody>
</table>
</div>
</div>


<!-- Modal -->
<div class="modal" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modeal-header1">
          <h5 class="modal-title" id="customerName"></h5>
          <p class="modal-correo" id="mail"></p>
        </div>
        <p class="modal-hora" id="date"></p >
      </div>

      <div class="modal-body">
        <p class="modal-registro" id="registryStatus"></p>
        <p class="modal-mensaje" id="message"></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#responder">Responder</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="responder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modal-header2">
        <h5 class="modal-title2" id="exampleModalCenteredLabel"> RESPONDER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-seccion">
          <p class="modal-labels">Para:</p>
          <p class="modal-correo2" id="mailAnswer"> </p>
        </div>
        <hr class="line">
        <div class="modal-seccion">
          <p class="modal-labels">Asunto:</p>
          <input id="subjectAnswer">
        </div>
        <hr class="line">
          <p class="modal-labels">Respuesta:</p>
          <textarea id="respuesta" id="textAnswer"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#confirm">Enviar</button>
      </div>
    </div>
  </div>
</div>

<script>
    let consultData;
  window.addEventListener("load", function(){
      updateList();
  });

  function updateList(){
      myTable2.innerHTML = "";
      fetch("./api/v1/consultas", {
          method: "GET"
      }).then(function (result) {
          if(result.ok) return result.json();
      }).then(function (data) {
          if(data != null){
              consultData = data;
              for (let i = 0; i < data.length; i++) {
                  var e = data[i];
                  myTable2.innerHTML +=
                      "<tr onclick='updateModal(" + i + ")'><td>" +
                      "<div class='arriba'>" +
                      "<div id='Tnombre'>" + e.name + " " + e.surname + "</div>" +
                      "<div id='Tfecha'>" + e.date + "</div>" +
                      "</div>" +
                      "<div id='Tconsulta'>" + e.message + "<div>" +
                      "</td></tr>";
              }
          }
      });
  }
  function updateModal(i){
      customerName.innerHTML = consultData[i].name;
      mail.innerHTML = consultData[i].mail;
      mailAnswer.innerHTML = consultData[i].mail;
      date.innerHTML = consultData[i].date;
      registryStatus.innerHTML = "aaaa"
      message.innerHTML = consultData[i].message;
      $('#mensaje').modal();
  }

</script>
<!---------------CERRAR SESIÓN----------------->
    <script src="./js/closeSession.js"></script>
    <script src="./js/checkAdminLogin.js"></script>
    <!------------------------------------------->
</section>
<?php include_once './includes/footer.php';?>
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