document.querySelector("form").addEventListener("submit", function(event){
    event.preventDefault();

    let formInfo = new FormData(event.target);

    fetch("./api/v1/customer", {
        method: "POST",
        body: formInfo
    }).then(function (result) {
        if(result.ok){
            cerrarFormulario();
            //TODO: MOSTRAR UNA CONFIRMACIÓN
        }else{
           //console.log("error al enviar formulario.");
        }
    }); 
});


window.addEventListener("load", function(){
    fetch("./api/v1/customer", {
      method: "GET"
    }).then(function (result) {
      if(result.ok) return result.json();
    }).then(function (data) {
      if(data != null){
        for (let i = 0; i < data.length; i++) {
          const e = data[i];
          myTable.innerHTML += "<tr id='" + e.username + "'>" + 
          "<td style='text-align: left;'>" + e.username + "</td>" + 
          "<td style='text-align: left;'>" + e.dni + "</td>" +
          "<td class='rol_y_baja'>" + e.type + "<div class='eliminar_casilla' id='eliminar-casilla'><button onclick='deleteUser(" + e.username + ")' class='eliminar' id='eliminar_boton'><i class='fas fa-trash-alt'></i></button></div></td> " +
          "</tr>";
        }
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