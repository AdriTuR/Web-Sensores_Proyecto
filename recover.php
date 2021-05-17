<?php
    $t = 1;
    $name = "Recuperar contraseña";
    include_once './includes/header.php';
    function customHead(){?>
        <!---<link rel="stylesheet" href="./css/panelMenu-style.css">--->
<?php }
?>

<body>
    <center>
    <form>
        <br>
        <p id="recoverError"></p>
        <br>
        <p>Nueva contraseña:</p>
        <input type="password" name="passwd" required>
        <p>Repite contraseña:</p>
        <input type="password" name="passwd2" required>
        <br>
        <br>
        <input type="submit" id="submitBtn" value="CAMBIAR" required>
        
    </form>
    </center>

    <?php include_once './includes/footer.php';?>

    <script>
        window.addEventListener("load", async function(){
            <?php
            if(!isset($_GET['token'])){
                header("Location: ./index.php");
                exit();
            }
            ?>
            var token = "<?php echo $_GET['token']; ?>";
            checkToken(token);
        });
    </script>
    <script src="./js/recovery.js"></script>
</body>


</html>