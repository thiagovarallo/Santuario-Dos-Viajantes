<?php
include_once("../connection.php");

$query = $pdo->query("SELECT * FROM type_room;")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/navbarAdmin.js" defer></script>
</head>

<body>

    <nav class="mobile_menu">

    </nav>

    <aside class="pc_menu">
        <ul>
            <a href="#">
                <li><img src="../img/icons/home.svg"> Home</li>
            </a>
            <a href="/src/adminCliente.php">
                <li><img src="../img/icons/user.svg"> usuarios</li>
            </a>
            <a href="/src/adminRoom.php">
                <li class="active"><img src="../img/icons/bed.svg" id="bedRoom"> Quartos</li>
            </a>
            <a href="#">
                <li><img src="../img/icons/home.svg"> Home</li>
            </a>
            <a href="#">
                <li><img src="../img/icons/home.svg"> Home</li>
            </a>

        </ul>
    </aside>





    <main>


        <div class="inputs_table">

            <a href="/src/formulario/typeRoom.php">
                <div class="input_add_data">
                    <img src="../img/icons/plus.svg" alt="" width="20px">
                    <p>Adicionar quarto</p>
                </div>
            </a>
        </div>
        <section class="table_container">

            <div class="name_table">
                <h2>Quartos</h2>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome do quarto</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row) : ?>
                        <tr>
                            <td data-label="Id"> <?= $row["id"] ?> </td>
                            <td data-label="Nome do quarto"><?= $row["name_room"] ?></td>
                            <td data-label="Descrição"><?= $row["description"] ?></td>
                            <td data-label="Preço"><?= $row["price"] ?></td>
                            <td data-label="imagem"><?= $row["img_path"] ?> udapjda</td>
                            <td data-label="Ações">
                                <a href="">
                                    <a href="">
                                        <img src="../img/icons/pencil.svg" alt="editar usuario" style="width: 19px; object-fit: fill;">
                                    </a>
                                    <a href="/src/operationHttp/methodDelete.php?id=<?= $row["id"] ?>&table=type_room">
                                        <img src="../img/icons/trash.svg" alt="apagar usuario" style="width: 20px; object-fit: fill;">
                                    </a>
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