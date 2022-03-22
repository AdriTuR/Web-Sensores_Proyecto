<div class="modal" id="consulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="HCons">CONSÚLTANOS</h5>

                <hr class="line">
            </div>

            <div class="modal-body">
                <p id="CT1">Ponte en contacto con nosotros y atenderemos tu consulta en un plazo de 24 horas</p>

                <select id="type">
                    <option value="solicitar_sensores">Solicitar sensores</option>
                    <option value="modificar_terrenos">Modificar terrenos/parcelas</option>
                    <option value="problemas_cuenta">Problemas con la cuenta</option>
                    <option value="problemas_sensores">Problemas con los sensores</option>
                    <option value="otro">Otro</option>
                </select>

                <form id="form_consult">
                    <p class="modal-labels">Escribe tu consulta:</p>
                    <textarea id="respuesta" minlength="5"></textarea>
                    <div class="modal-footer">
                        <button onclick="submitClick(event)" type="submit" id="enviar" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function submitClick(e) {
        e.preventDefault();

        let formInfo = new FormData();

        formInfo.append("type", type.value);
        formInfo.append("message", respuesta.innerHTML);
        formInfo.append("name", "a");
        formInfo.append("surname", "a");
        formInfo.append("mail", "aa");

        fetch("./api/v1/consultas", {
            method: "POST",
            body: formInfo
        }).then(function (result) {
            if(result.ok){
                $('#consulta').modal('hide');
                $("#respuesta").val("");
            }
        });
    }

</script>