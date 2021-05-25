
<?php
$t = 3;
$name = "password";
include_once './includes/header.php';
function customHead(){?>
    <link rel="stylesheet" href="./css/password.css">
    <link rel="stylesheet" href="./css/common.css">
<?php }
?>

<body>
    <h1>
        VAS A CAMBIAR TU CONTRASEÑA
    </h1>
    <img class="icono" src="images/chage-pasword_icon.png" alt="icono de cambio de contraseña">
    <br>
    <p>
        ¿Está seguro de que quiere cambiar la contraseña?
    </p>
    <div id="botones">
        <button class="boton">SI</button>
        <button class="boton">NO</button>
</div>

    <?php include_once './includes/footer.php';?>
</body>