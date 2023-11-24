<?php
include_once("../connection.php");

session_start();

if (!isset($_SESSION["Logged"]) || $_SESSION["Logged"] !== true || !isset($_SESSION["Role"]) || $_SESSION["Role"] == "user") {
    header("Location: /");
    exit();
}

if ($_SESSION["Role"] == "admin") {
    $query = $pdo->query("SELECT * FROM users;")->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Clientes</title>
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/navbarAdmin.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/confirm.js" defer></script>
</head>

<body>
    <?php include_once './components/modalConfirmDelete.html' ?>

    <?php include_once './components/modalConfirmSave.html' ?>

    <nav class="mobile_menu">
        <ul>
            <a href="/src/adminCliente.php">
                <li>Usuarios</li>
            </a>
            <a href="/src/adminRoom.php">
                <li>Quartos</li>
            </a>
            <a href="/src/adminReserva.php">
                <li>Reserva</li>
            </a>
        </ul>
    </nav>

    <aside class="pc_menu">
        <ul>
            <a href="/src/adminCliente.php" class="text-decoration-none">
                <li class="active"><img src="../img/icons/user.svg">Usuarios</li>
            </a>
            <a href="/src/adminRoom.php" class="text-decoration-none">
                <li><img src="../img/icons/bed.svg" id="bedRoom">Quartos</li>
            </a>
            <a href="/src/adminReserva.php" class="text-decoration-none">
                <li><img src="../img/icons/home.svg">Reserva</li>
            </a>
        </ul>
    </aside>

    <main>
        <div class="inputs_table bg-transparent">

        </div>

        <section class="table_container">

            <div class="name_table">
                <h2>Usuarios</h2>
            </div>

            <table class="table table-primary table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Sexo</th>
                        <th>Telefone</th>
                        <th>Logadouro</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>CEP</th>
                        <th>País</th>
                        <th>Role</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row) : ?>
                        <tr class="coluns_table">
                            <td data-label="Id" class="" style="word-break: break-all;"> <?= $row["id"] ?> </td>
                            <td data-label="Nome" style="word-break: break-all;"><?= $row["name"] ?></td>
                            <td data-label="email" style="word-break: break-all;"><?= $row["email"] ?></td>
                            <td data-label="CPF" style="word-break: break-all;"><?= $row["CPF"] ?></td>
                            <td data-label="Sexo" style="word-break: break-all;"><?= $row["sexo"] ?></td>
                            <td data-label="Telefone" style="word-break: break-all;"><?= $row["telefone"] ?></td>
                            <td data-label="Logadouro" style="word-break: break-all;"><?= $row["logadouro"] ?></td>
                            <td data-label="Número" style="word-break: break-all;"><?= $row["numero"] ?></td>
                            <td data-label="Bairro" style="word-break: break-all;"><?= $row["bairro"] ?></td>
                            <td data-label="Cidade" style="word-break: break-all;"><?= $row["cidade"] ?></td>
                            <td data-label="Estado" style="word-break: break-all;"><?= $row["estado"] ?></td>
                            <td data-label="CEP" style="word-break: break-all;"><?= $row["cep"] ?></td>
                            <td data-label="País" style="word-break: break-all;"><?= $row["pais"] ?></td>
                            <td data-label="Role" style="word-break: break-all;"><?= $row["role"] ?></td>
                            <td data-label="Ações">

                                <a href="./formulario/editDataUser.php?id=<?= $row["id"] ?>">
                                    <img src=" ../img/icons/pencil.svg" alt="editar usuario" style="width: 19px; object-fit: fill;">
                                </a>
                                <button id="deleteButton" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?= $row['id'] ?>" data-table="users">
                                    <img src="../img/icons/trash.svg" alt="apagar usuario" style="width: 20px; object-fit: fill;">
                                </button>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>

    </main>
</body>

</html>