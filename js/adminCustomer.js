document.querySelector("form").addEventListener("submit", function(event){
    event.preventDefault();

    let formInfo = new FormData(event.target);

    fetch("./api/v1/customer", {
        method: "POST",
        body: formInfo
    }).then(function (result) {
        if(result.ok){
            cerrarPopUp();
            //TODO: MOSTRAR UNA CONFIRMACIÓN
        }else{
           //console.log("error al enviar formulario.");
        }
    }); 
});

function deleteUser(username){
    fetch("./api/v1/customer/" + username.id, {
        method: "DELETE"
    }).then(function (result) {
      if(result.ok) username.innerHTML = ""
    });
  }