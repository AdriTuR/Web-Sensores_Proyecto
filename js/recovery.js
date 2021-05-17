async function checkToken(token){
    fetch("./api/includes/recovery.php/?token=" + token, {
        method: "GET"
    }).then(await function (result) {
        if(result.ok){ 
            return result.json();
        }else{
            location.href = "./index.php";
        }
    }).then(function(data){
        if(data.status == "ok"){
            id = data.id;
        }else{
            recoverError.innerHTML = "Token expirado";
        }
    });
}

document.querySelector("form").addEventListener("submit", function(event){
    event.preventDefault();

    let formInfo = new FormData(event.target);
    if(formInfo.get("passwd") !== formInfo.get("passwd2")){
        recoverError.innerHTML = "Las contraseñas no coinciden!";
        return;
    }
    formInfo.append("id", id);
    
    fetch("./api/includes/recovery.php", {
        method: "POST",
        body: formInfo
    }).then(function (result) {
        if(result.ok) return result.json();
    }).then(function(data){
        if(data.status === "ok"){
            fetch("./api/v1/", {
                method: "DELETE"
            });
            console.log("clave cambiada correctamete");
            //TODO: MOSTRAR POPUP DE CLAVE CAMBIADA Y BOTON PARA IR AL LOGIN
        }
    });
    
});