
function submitForm() {
    const form = document.getElementById('form');

    form.submit();
}

function deleteById(table) {
    const deleteButton = document.getElementById("deleteButton")
    const id = deleteButton.getAttribute('data-id')


    window.location.href = `/src/operationHttp/methodDelete.php?id=${id}&table=${table}`;
}