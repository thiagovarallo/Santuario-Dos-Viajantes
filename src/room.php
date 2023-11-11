<?php
include_once "../connection.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false) {
    http_response_code(404);
    echo "Id invalido";
    exit;
}

$sql = "SELECT * FROM type_room WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$query = $stmt->fetch(PDO::FETCH_ASSOC);


if ($query === false) {
    http_response_code(404);
    echo "Quarto não encontrado";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/room.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>

    <?php include_once './components/navbar.html' ?>

    <section class="container_room">
        <div>
            <section class="pictures_room">
                <img src="data:image/jpg;base64, <?= base64_encode($query['image']) ?>" alt="<?= $query['name_room'] ?>">
            </section>
        </div>

        <div class="box_buy">
            <h2>Quarto executivo</h2>

        </div>
    </section>

    <section class="container_description">
        <div class="description">
            a
        </div>
    </section>


    <?php include_once './components/footer.html' ?>

</body>

</html>