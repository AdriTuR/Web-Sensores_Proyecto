document.querySelector(".formulario_contraseña").addEventListener("submit", function(event){
    event.preventDefault();

    let formInfo = new FormData(event.target);

    fetch("./api/includes/sendRecoveryMail.php", {
        method: "POST",
        body: formInfo
    }).then(function (result) {
        if(result.ok) return result.json();
    }).then(function(data){
        if(data != null && data.status == "ok"){
            mostrarConfirmacion();
        }
    });
});