
function submitForm() {
    const form = document.getElementById('form');

    form.submit();
}

function deleteById() {
    const deleteButton = document.getElementById("deleteButton")
    const id = deleteButton.getAttribute('data-id')
    const table = deleteButton.getAttribute('data-table')



    window.location.href = `/src/operation/methodDelete.php?id=${id}&table=${table}`;
}

function deleteReserva () {
    const deleteButton = document.getElementById("deleteButton")
    const id = deleteButton.getAttribute('data-id');

    window.location.href = `/src/operation/deleteHospedagem.php?id=${id}`;
}