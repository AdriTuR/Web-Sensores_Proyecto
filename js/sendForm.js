document.querySelector("form").addEventListener("submit", function(event){
    event.preventDefault();

    let dataLogin = new FormData(event.target);

    fetch("/api/includes/sendContactForm.php", {
        method: "POST",
        body: dataLogin
    }).then(function (result) {
        if(result.ok){
            cerrarFormulario();
			
        }else{
            console.log("error al enviar formulario.");
        }
    });
});