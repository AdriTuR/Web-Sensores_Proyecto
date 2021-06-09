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

<div class="espacio_canvas">
    <canvas id="myCanvas">

    </canvas>
</div>





</section>
<?php include_once './includes/footer.php';?>
</body>