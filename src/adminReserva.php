<?php
include_once("../connection.php");

session_start();

if (!isset($_SESSION["Logged"]) || $_SESSION["Logged"] !== true || !isset($_SESSION["Role"]) || $_SESSION["Role"] == "user") {
    header("Location: /"); 
    exit(); 
}

if ($_SESSION["Role"] == "admin") {
    $query = $pdo->query("SELECT * FROM accommodation;")->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reserva</title>
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
            <a href="/src/adminRoom.php" class="text-decoration-none">
                <li><img src="../img/icons/home.svg"> Reserva</li>
            </a>
            <a href="#" class="text-decoration-none">
                <li><img src="../img/icons/home.svg"> Home</li>
            </a>
        </ul>
    </aside>

    <main>
        <div class="inputs_table bg-transparent">
            
        </div>

        <section class="table_container">

            <div class="name_table">
                <h2>Reservas</h2>
            </div>

            <table class="table table-primary table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id usuário</th>
                        <th>Email usuário</th>
                        <th>Tipo do quarto</th>
                        <th>Data check-in</th>
                        <th>Data check-out</th>
                        <th>Número de adultos</th>
                        <th>Número de crianças</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row) : ?>
                        <tr class="coluns_table">
                            <td data-label="Id" class="" style="word-break: break-all;"> <?= $row["Id_hospedagem"] ?> </td>
                            <td data-label="Id usuário" class="" style="word-break: break-all;"> <?= $row["id_user"] ?> </td>
                            <td data-label="Email do usuário" style="word-break: break-all;"><?= $row["email_user"] ?></td>
                            <td data-label="Tipo do quarto" style="word-break: break-all;"><?= $row["type_room"] ?></td>
                            <td data-label="Data check-in" style="word-break: break-all;"><?= $row["date_check_in"] ?></td>
                            <td data-label="Data check-out" style="word-break: break-all;"><?= $row["date_check_out"] ?></td>
                            <td data-label="Número de adultos" style="word-break: break-all;"><?= $row["num_adult"] ?></td>
                            <td data-label="Número de crianças" style="word-break: break-all;"><?= $row["num_children"] ?></td>
                            <td data-label="Status" style="word-break: break-all; cursor: pointer;" ondblclick="statusReserva('<?= $row['Id_hospedagem'] ?>', '<?= $row['email_user'] ?>', '<?= $row['type_room'] ?>','<?= $row['id_user'] ?>')"><?= $row["status"] ?></td>
                            
                            <td data-label="Ações">
                                <a href="">
                                    <a href="">
                                        <img src="../img/icons/pencil.svg" alt="editar usuario" style="width: 19px; object-fit: fill;">
                                    </a>
                                    <button onclick="deleteReserva()" id="deleteButton" class="border border-0 bg-transparent" data-id="<?= $row['Id_hospedagem'] ?>">
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

    <script>
        function statusReserva (id, email_user, type_room, id_user) {
            window.location.href = `/src/operation/statusReserva.php?id=${id}&emailUser=${email_user}&typeroom=${type_room}&iduser=${id_user}`;
        }
    </script>

</body>

</html>