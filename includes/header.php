<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/common.css" />
<?php if (function_exists('customHead')){
    customHead();
}?>
<title><?= isset($name) ? $name : "GTI"?></title>
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-----------------------------------------FUENTES---------------------------------------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <!------------------------------------------ICONOS---------------------------------------------------->
    <script src="https://kit.fontawesome.com/5842e39ab5.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="encabezado" id="header">    
        <a href="index.php"><img class="logo" src="images/logoGTI.png" alt="logo del sitio web"></a>
    <?php
    if(isset($t) && $t == 1){
        include './includes/menu.php';
    }

    if(isset($t) && $t == 3){
        include './includes/menu-login.php';
    }

    if(isset($t) && $t == 2){
        include './includes/menu_app.php';
    }
    if(isset($t) && $t == 4){
        include './includes/menu_app_gene.php';
    }
    if(isset($t) && $t == 5){
        include './includes/menu_user.php';
    }
    ?>
    </header>
</body>
</html>