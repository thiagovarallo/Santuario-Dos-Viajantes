<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../../connection.php";

    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
        $data_image = file_get_contents($_FILES["imagem"]["tmp_name"]);

        $sql = "INSERT INTO type_room (name_room, description, price, image, number_adult, number_children, number_beds) VALUES (:name_room, :description, :price, :image, :number_adult, :number_children, :number_beds)";
        
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":name_room", $_POST["name_room"]);
        $statement->bindValue(":description", $_POST["description_room"]);
        $statement->bindValue(":price", intval($_POST["price_room"]));
        $statement->bindValue(":image", $data_image, PDO::PARAM_LOB); // Usar PDO::PARAM_LOB para dados BLOB
        $statement->bindValue(":number_adult", $_POST["number_adult"]);
        $statement->bindValue(":number_children", $_POST["number_children"]);
        $statement->bindValue("number_beds", $_POST["number_beds"]);


        $statement->execute();

        header("Location: /src/adminRoom.php");
    } else {
        echo "Erro no upload da imagem. Código de erro: " . $_FILES["image"]["erro"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/modal.css">
    <script src="src/js/navbar.js" defer></script>
    <script src="../js/confirm.js" defer></script>
</head>
<body>

    <?php include_once '../components/modalConfirmSave.html'?>


    <?php include_once '../components/navbar.html' ?>

    <main>
        <div class="title_form">
            <h2>Adiocionar um novo quarto</h2>
        </div>

        <form class="row g-3 needs-validation" action="./typeRoom.php" method="post" id="form" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="name_room" class="form-label" require>Nome do quarto</label>
                <input type="text" class="form-control" id="name_room" name="name_room" placeholder="Ex: luxo" required>
            </div>
            <div class="col-md-6">
                <label for="price_room" class="form-label" require>Preço</label>
                <input type="number" step="0.01" class="form-control" id="price_room" name="price_room" placeholder="Ex: 5" required>
            </div>
            <div class="mb-6">
                <label for="description_room" class="form-label">Descrição do quarto</label>
                <textarea class="form-control" id="description_room" name="description_room" rows="3"></textarea>
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Adicionar imagem do quarto</label>
                <input class="form-control" type="file" id="imagem" name="imagem">
            </div>

            <hr>       

            <div class="col-md-6">
                <label for="number_adult" class="form-label" require>Número máximo de Adultos</label>
                <input type="number" class="form-control" id="number_adult" name="number_adult" placeholder="Ex: 2" required>
            </div>
            <div class="col-md-6">
                <label for="number_children" class="form-label" require>Número máximo de crianças</label>
                <input type="number" class="form-control" id="number_children" name="number_children" placeholder="Ex: 5" required>
            </div>
            <div class="col-md-6">
                <label for="number_beds" class="form-label" require>Número de camas</label>
                <input type="number" class="form-control" id="number_beds" name="number_beds" placeholder="Ex: 1" required>
            </div>

            <div class="col-12">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Cadastrar quarto</a>
                <button class="btn btn-danger" type="reset">Apagar tudo</button>
            </div>
        </form>
    </main>

    <?php include_once '../components/footer.html' ?>
</body>

</html>