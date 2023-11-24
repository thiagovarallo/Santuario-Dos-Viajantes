<?php
include_once("../connection.php");

session_start();

if (!isset($_SESSION["Logged"]) || $_SESSION["Logged"] !== true || !isset($_SESSION["Role"]) || $_SESSION["Role"] == "user") {
    header("Location: /"); 
    exit(); 
}

if ($_SESSION["Role"] == "admin") {
    $query = $pdo->query("SELECT * FROM type_room;")->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/navbarAdmin.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/confirm.js" defer></script>
</head>

<body>
    <?php include_once './components/modalConfirmDelete.html'?>

    <?php include_once './components/modalConfirmSave.html' ?>

    <nav class="mobile_menu">

    </nav>

    <aside class="pc_menu">
        <ul>
            <a href="#" class="text-decoration-none">
                <li><img src="../img/icons/home.svg"> Home</li>
            </a>
            <a href="/src/adminCliente.php" class="text-decoration-none">
                <li><img src="../img/icons/user.svg"> usuarios</li>
            </a>
            <a href="/src/adminRoom.php" class="text-decoration-none">
                <li class="active"><img src="../img/icons/bed.svg" id="bedRoom"> Quartos</li>
            </a>
            <a href="/src/adminReserva.php" class="text-decoration-none">
                <li><img src="../img/icons/home.svg"> Reserva</li>
            </a>
            <a href="#" class="text-decoration-none">
                <li><img src="../img/icons/home.svg"> Home</li>
            </a>
        </ul>
    </aside>

    <main>
        <div class="inputs_table bg-transparent">
            <a href="/src/formulario/typeRoom.php" class="text-decoration-none">
                <div class="input_add_data">
                    <img src="../img/icons/plus.svg" alt="" width="20px">
                    <p style="height: 10px; ">Adicionar quarto</p>
                </div>
            </a>
        </div>

        <section class="table_container">

            <div class="name_table">
                <h2>Quartos</h2>
            </div>

            <table class="table table-primary table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome do quarto</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Número de adultos</th>
                        <th>Número de crianças</th>
                        <th>Número de camas</th>
                        <th>imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row) : ?>
                        <tr class="coluns_table">
                            <td data-label="Id" class=""> <?= $row["id"] ?> </td>
                            <td data-label="Nome do quarto"><?= $row["name_room"] ?></td>
                            <td data-label="Descrição" id="room_description"><p>
                            <?php
                                $description = $row["description"];

                                $words = explode(' ', $description);

                                $firt_10_words = implode(' ', array_slice($words, 0, 11));

                                echo $firt_10_words;
                            ?>
                            </p>
                            </td>
                            <td data-label="Preço"><?= $row["price"] ?></td>
                            <td data-label="Número de adultos"><?= $row["number_adult"] ?></td>
                            <td data-label="Número de crianças"><?= $row["number_children"] ?></td>
                            <td data-label="Número de quartos"><?= $row["number_beds"] ?></td>
                            <td data-label="imagem"><img src="data:image/jpg;base64, <?= base64_encode($row['image']) ?>" alt="<?= $row["name_room"] ?>" width="30px"></td>
                            <td data-label="Ações">
                                <a href="">
                                    <a href="./formulario/typeRoomEdit.php?id=<?= $row["id"] ?>">
                                        <img src="../img/icons/pencil.svg" alt="editar usuario" style="width: 19px; object-fit: fill;">
                                    </a>
                                    <button id="deleteButton" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?= $row['id'] ?>" data-table="type_room">
                                        <img src="../img/icons/trash.svg" alt="apagar usuario" style="width: 20px; object-fit: fill;">
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>

    </main>
</body>

</html>