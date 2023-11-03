<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body flex-column d-flex align-items-center">
                <img src="../../img/icons/alert.svg" alt="" class="object-fit-cover"
                    style="width: 10rem; filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 0.246));">
                <p class="fs-5 text-center fw-semibolde">Você tem certeza que deseja excluir o registro definitivamente?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="deleteById('type_room')" data-bs-dismiss="modal">Sim, apagar!</button>
            </div>
        </div>
    </div>
</div>