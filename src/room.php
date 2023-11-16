<?php
include_once "../connection.php";

session_start();

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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    if ($_SESSION["Logged"] == true) {
        echo "logado";
    } else {
        header("location: /src/login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $query["name_room"] ?></title>
    <link rel="stylesheet" href="./css/room.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <?php include_once './components/navbar.html' ?>

    <section class="container_room">
        <div class="box_pictures">
            <section class="pictures_room">
                <img src="data:image/jpg;base64, <?= base64_encode($query['image']) ?>" alt="<?= $query['name_room'] ?>">
            </section>
        </div>

        <div class="box_buy">
            <h1><?= $query["name_room"] ?></h1>
            <p class="number_people">até <?= $query["number_adult"] ?> adultos, até <?= $query["number_children"] ?> crianças, total de cama <?= $query["number_beds"] ?></p>
            <h3 class="price">R$ <?= $query["price"] ?></h3>

            <form class="row g-3 bg-transparent" method="post" action="./room.php?id=<?= $id ?>">
                <section class="col-md-6">
                    <label for="inputEmail4" class="form-label">Quantidades de adultos</label>
                    <input type="number" class="form-control" id="inputEmail4" min="0" max="<?= $query["number_adult"] ?>">
                </section>
                <section class="col-md-6">
                    <label for="inputPassword4" class="form-label">Quantidades de crianças</label>
                    <input type="number" class="form-control" id="inputPassword4" min="0" max="<?= $query["number_children"] ?>">
                </section>
                <section class="col-md-6">
                    <label for="inputEmail4" class="form-label">Data de check-in</label>
                    <input type="date" class="form-control" id="inputEmail4">
                </section>
                <section class="col-md-6">
                    <label for="inputPassword4" class="form-label">Data de check-out</label>
                    <input type="date" class="form-control" id="inputPassword4">
                </section>
                <section class="col-md-12 d-flex justify-content-center" >
                    <button type="submit" class="btn" id="button_submit">Reservar</button>
                </section>
            </form>

        </div>
    </section>

    <section class="container_description">
        <div class="description">
            <?= $query["description"] ?>
        </div>
    </section>


    <?php include_once './components/footer.html' ?>

</body>

</html>