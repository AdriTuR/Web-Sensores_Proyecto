document.querySelector(".formulario_contraseña").addEventListener("submit", function(event){
    event.preventDefault();

    let formInfo = new FormData(event.target);

    fetch("./api/includes/mail.php", {
        method: "POST",
        body: formInfo
    }).then(function (result) {
        if(result.ok){
            mostrarConfirmacion();
        }else{
            // console.log("error al enviar formulario.");
            //alert("NO CORRECTO");
        }
    });
});