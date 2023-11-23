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



    if ($_SESSION["First_login"] == 0) {
        header("Location: /");
    }

    if ($_SESSION["Logged"] == true) {

        $email_user = $_SESSION["Email"];
        $id_user = $_SESSION["Id_user"];
        $type_room = $query["name_room"];
        $date_check_in = $_POST["date_check-in"];
        $date_check_out = $_POST["date_check-out"];
        $status = "Pendente";
        $num_adult = $_POST["num_adult"];
        $num_children = $_POST["num_children"];


        $sql = "INSERT INTO accommodation (email_user, type_room, date_check_in, date_check_out, status, num_adult, num_children, id_user) 
        VALUES (:email_user, :type_room, :date_check_in, :date_check_out, :status, :num_adult, :num_children, :id_user)";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email_user', $email_user);
            $stmt->bindValue(':type_room', $type_room);
            $stmt->bindValue(':date_check_in', $date_check_in);
            $stmt->bindValue(':date_check_out', $date_check_out);
            $stmt->bindValue(':status', $status);
            $stmt->bindValue(':num_adult', $num_adult);
            $stmt->bindValue(':num_children', $num_children);
            $stmt->bindValue(':id_user', $id_user);

            $stmt->execute();

            echo "<script> alert('Reserva realizada com sucesso') </script>";
            
            
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

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
                    <label for="num_adult" class="form-label">Quantidades de adultos</label>
                    <input type="number" class="form-control" name="num_adult" min="0" max="<?= $query["number_adult"] ?>">
                </section>
                <section class="col-md-6">
                    <label for="num_children" class="form-label">Quantidades de crianças</label>
                    <input type="number" class="form-control" name="num_children" min="0" max="<?= $query["number_children"] ?>">
                </section>
                <section class="col-md-6">
                    <label for="date_check-in" class="form-label">Data de check-in</label>
                    <input type="date" class="form-control" name="date_check-in">
                </section>
                <section class="col-md-6">
                    <label for="date_check-out" class="form-label">Data de check-out</label>
                    <input type="date" class="form-control" name="date_check-out">
                </section>
                <section class="col-md-12 d-flex justify-content-center">
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