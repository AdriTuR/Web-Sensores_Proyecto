<?php
$t = 4;
$name = "Panel Admin";
include_once './includes/header.php';
include_once './api/includes/adminStats.php';
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
<?php 
$conn = mysqli_connect("localhost","root","","grupo9");
if($conn-> connect_error) {
  die("Connection failed".$conn);
}
$query = "SELECT id, username, role from user where role='USER'";
$result=mysqli_query($conn,$query);
?>
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

        <tr>
            <td>
                <div class="arriba">
                    <div id="Tnombre">
                        Joseba Jimenez
                    </div>

                    <div id="Tfecha">
                        09/05/2021 19:26
                    </div>
                </div>

                <div id="Tconsulta">
                    Buenas tardes, acabo de encontrar esta página y he leido sobre todo lo que ofreceis,
                    estaria interesado en obtener...
                <div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="arriba">
                    <div id="Tnombre">
                        Joseba Jimenez
                    </div>

                    <div id="Tfecha">
                        09/05/2021 19:26
                    </div>
                </div>

                <div id="Tconsulta">
                    Buenas tardes, acabo de encontrar esta página y he leido sobre todo lo que ofreceis,
                    estaria interesado en obtener...
                <div>
            </td>
        </tr>
        

    </tbody>
</table>
</div>
<!---------------CERRAR SESIÓN----------------->
    <script src="./js/closeSession.js"></script>
    <!------------------------------------------->
</section>
<?php include_once './includes/footer.php';?>
</body>