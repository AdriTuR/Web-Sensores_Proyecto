document.querySelector("form").addEventListener("submit", function(event){
    event.preventDefault();

    let formInfo = new FormData(event.target);

    fetch("./api/includes/sendContactForm.php", {
        method: "POST",
        body: formInfo
    }).then(function (result) {
        if(result.ok){
            cerrarFormulario();
            mostrarConfirmacion();
        }else{
           // console.log("error al enviar formulario.");
        }
    });
});