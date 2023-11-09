
function submitForm() {
    const form = document.getElementById('form');

    form.submit();
}

function deleteById() {
    const deleteButton = document.getElementById("deleteButton")
    const id = deleteButton.getAttribute('data-id')
    const table = deleteButton.getAttribute('data-table')



    window.location.href = `/src/operationHttp/methodDelete.php?id=${id}&table=${table}`;
}