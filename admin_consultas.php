<?php
$t = 4;
$name = "Panel Admin";
include_once './includes/header.php';

function customHead(){?>
    <link rel="stylesheet" href="./css/adminc-style.css">
    <link rel="stylesheet" href="./css/panelMenu-style.css">
<?php }
?>
<body>
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
    <!--<div id="filtroboton">
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

        <button id="refresh">
            <i class="fas fa-sync fa-1.5x"></i>
        </button>
    </div> -->


<table class="table table-bordered " id="tablacons">
    <tbody id="myTable2">
    </tbody>
</table>
</div>

<script>
  window.addEventListener("load", function(){
    fetch("./api/v1/consultas", {
      method: "GET"
    }).then(function (result) {
      if(result.ok) return result.json();
    }).then(function (data) {
      if(data != null){
        for (let i = 0; i < data.length; i++) {
          const e = data[i];
          myTable2.innerHTML += 
          "<tr><td>" +
                "<div class='arriba'>" +
                "<div id='Tnombre'>" + e.name + " " + e.surname + "</div>" +
                "<div id='Tfecha'>" + e.date + "</div>" +
                "</div>" +
                "<div id='Tconsulta'>" + e.message + "<div>" +
                "</td></tr>"
        }
      }
    });
  });
</script>
<!---------------CERRAR SESIÓN----------------->
    <script src="./js/closeSession.js"></script>
    <script src="./js/checkAdminLogin.js"></script>
    <!------------------------------------------->
</section>
<?php include_once './includes/footer.php';?>
</body>