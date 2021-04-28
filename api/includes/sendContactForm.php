<?php
//-----------------------------ENVIAR DATOS DEL FORMULARIO-----------------------------//
if (isset($_POST['enviar_formulario'])){

    require 'connection.php';

    if(strlen($_POST['introducir_nombre']) >= 1 && strlen($_POST['introducir_correo']) >= 1 && strlen($_POST['introducir_mensaje']) >= 1){
        $nombre = trim($_POST['introducir_nombre']);
        $apellidos = trim($_POST['introducir_apellidos']);
        $correo = trim($_POST['introducir_correo']);
        $mensaje = trim($_POST['introducir_mensaje']);

        $consulta = "INSERT INTO `inquiries` (name, surname, email, message) VALUES ('" . $nombre . "', '" . $apellidos . "', '" . $correo . "', '" . $mensaje . "');";
        $resultado = mysqli_query($conn, $consulta);

        if($resultado){
            ?>
            <h3>Tu consulta ha sido enviada</h3>
            <?php
        }else{
            ?>
            <h3>Error</h3>
            <?php
        }
    }else {
        ?>
        <h3>Error, profavor complete los campos obligatorios que faltan </h3>
        <?php
    }

}
