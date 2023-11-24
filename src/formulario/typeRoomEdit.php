<?php

session_start();

if (!isset($_SESSION["Logged"]) || $_SESSION["Logged"] !== true || !isset($_SESSION["Role"]) || $_SESSION["Role"] == "user") {
    header("Location: /");
    exit();
}

if ($_SESSION["Role"] == "admin") {
    include_once '../../connection.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Use prepared statement for SELECT query to prevent SQL injection
    $stmtSelect = $pdo->prepare("SELECT * FROM type_room WHERE id = :id");
    $stmtSelect->bindValue(":id", $id, PDO::PARAM_INT);
    $stmtSelect->execute();

    $queryRoom = $stmtSelect->fetch(PDO::FETCH_ASSOC);

    if ($queryRoom === false) {
        http_response_code(404);
        echo "Quarto não encontrado";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../../connection.php";

    $sql = "UPDATE type_room SET name_room=:name_room, description=:description, image=:image, price=:price, number_adult=:number_adult, number_children=:number_children, number_beds=:number_beds where id = :id";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(":name_room", $_POST["name_room"]);
    $statement->bindValue(":description", $_POST["description_room"]);
    $statement->bindValue(":image", $queryRoom["image"]);
    $statement->bindValue(":price", intval($_POST["price_room"]));
    $statement->bindValue(":number_adult", $_POST["number_adult"]);
    $statement->bindValue(":number_children", $_POST["number_children"]);
    $statement->bindValue(":number_beds", $_POST["number_beds"]);
    $statement->bindValue(":id", $id);

    try {
        $statement->execute();
    
        header("Location: /src/adminRoom.php");
        exit; // Important to prevent further execution after redirect
    } catch (PDOException $e) {
        // Log the error or handle it appropriately
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar quarto</title>
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

    <?php include_once '../components/navbar.html' ?>

    <main>
        <div class="title_form">
            <h2>Editar valores do quarto</h2>
        </div>

        <form class="row g-3 needs-validation" action="./typeRoomEdit.php?id=<?= $queryRoom['id'] ?>" method="post" id="form" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="name_room" class="form-label" require>Nome do quarto</label>
                <input type="text" class="form-control" id="name_room" name="name_room" placeholder="Ex: luxo" value="<?= $queryRoom["name_room"] ?>" required>
            </div>
            <div class="col-md-6">
                <label for="price_room" class="form-label" require>Preço</label>
                <input type="number" step="0.01" class="form-control" id="price_room" name="price_room" placeholder="Ex: 5" value="<?= $queryRoom["price"] ?>" required>
            </div>
            <div class="mb-6">
                <label for="description_room" class="form-label">Descrição do quarto</label>
                <textarea class="form-control" id="description_room" name="description_room" rows="3"><?= $queryRoom["description"] ?></textarea>
            </div>
            
            <hr>

            <div class="col-md-6">
                <label for="number_adult" class="form-label" require>Número máximo de Adultos</label>
                <input type="number" class="form-control" id="number_adult" name="number_adult" placeholder="Ex: 2" value="<?= $queryRoom["number_adult"] ?>" required>
            </div>
            <div class="col-md-6">
                <label for="number_children" class="form-label" require>Número máximo de crianças</label>
                <input type="number" class="form-control" id="number_children" name="number_children" value="<?= $queryRoom["number_children"] ?>" placeholder="Ex: 5" required>
            </div>
            <div class="col-md-6">
                <label for="number_beds" class="form-label" require>Número de camas</label>
                <input type="number" class="form-control" id="number_beds" name="number_beds" placeholder="Ex: 1" value="<?= $queryRoom["number_beds"] ?>" required>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Alterar informações</button>
                <button class="btn btn-danger" type="reset">Apagar tudo</button>
            </div>
        </form>
    </main>

    <?php include_once '../components/footer.html' ?>
</body>

</html>