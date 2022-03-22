let Consultas = {
    cargar : function () {
        fetch("../api/v1.0/modelos/getConsultas.php").then(function (respuesta) {
            return respuesta.json();
        }).then((json) => {
            this.datos = json;
            this.controlador.representar(this.datos);
        })
    },
    datos: [],
    controlador: {}
};
/*let SelectorConsultas = {
    selector: {},
    preparar: function(selectId) {
        this.selector = document.getElementById(selectId);
        this.selector.innerHTML = "<option value='0'>Todos</option>";
    },
    representar : function (datos) {
        datos.forEach((parcels) => {
            this.selector.innerHTML += `<option value="${inquiries.id}">
            ${inquiries.id}, ${inquiries.name}
            </option>`;
        })
    }
};*/