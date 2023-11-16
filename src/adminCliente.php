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
</head>
<body>

<nav class="mobile_menu">

</nav>

<aside class="pc_menu">
    <ul>
        <a href="#" class="text-decoration-none">
            <li><img src="../img/icons/home.svg"> Home</li>
        </a>
        <a href="/src/adminCliente.php" class="text-decoration-none">
            <li class="active"><img src="../img/icons/user.svg"> usuarios</li>
        </a>
        <a href="/src/adminRoom.php" class="text-decoration-none">
            <li ><img src="../img/icons/bed.svg" id="bedRoom"> Quartos</li>
        </a>
        <a href="#" class="text-decoration-none">
            <li><img src="../img/icons/home.svg"> Home</li>
        </a>
        <a href="#" class="text-decoration-none">
            <li><img src="../img/icons/home.svg"> Home</li>
        </a>
    </ul>
</aside>


    <main>


        <div class="inputs_table">

                <a href="#">
                    <div class="input_add_data">
                        <img src="../img/icons/addUser.svg" alt="">
                        <p>Adicionar usuário</p>
                    </div>
                </a>
        </div>
        <section class="table_container">

            <div class="name_table">
                <h2>Clientes</h2>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Id">1</td>
                        <td data-label="CPF">970.099.640-92</td>
                        <td data-label="Nome">Thiago Varallo Rezende Da Silva</td>
                        <td data-label="Sexo">masculino</td>
                        <td data-label="Email">thiagovaralllo@gmail.com</td>
                        <td data-label="Telefone">(12) 99600-4872</td>
                        <td data-label="Ações">
                            <a href="">
                                <img src="../img/icons/pen.svg" alt="editar usuario" style="width: 17px;">
                                <img src="../img/icons/trash.svg" alt="apagar usuario" style="width: 17px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Id">1</td>
                        <td data-label="CPF">970.099.640-92</td>
                        <td data-label="Nome">Thiago Varallo Rezende Da Silva</td>
                        <td data-label="Sexo">masculino</td>
                        <td data-label="Email">thiagovaralllo@gmail.com</td>
                        <td data-label="Telefone">(12) 99600-4872</td>
                        <td data-label="Ações">
                            <a href="">
                                <img src="../img/icons/pen.svg" alt="editar usuario" style="width: 17px;">
                                <img src="../img/icons/trash.svg" alt="apagar usuario" style="width: 17px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Id">1</td>
                        <td data-label="CPF">970.099.640-92</td>
                        <td data-label="Nome">Thiago Varallo Rezende Da Silva</td>
                        <td data-label="Sexo">masculino</td>
                        <td data-label="Email">thiagovaralllo@gmail.com</td>
                        <td data-label="Telefone">(12) 99600-4872</td>
                        <td data-label="Ações">
                            <a href="">
                                <img src="../img/icons/pen.svg" alt="editar usuario" style="width: 17px;">
                                <img src="../img/icons/trash.svg" alt="apagar usuario" style="width: 17px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Id">1</td>
                        <td data-label="CPF">970.099.640-92</td>
                        <td data-label="Nome">Thiago Varallo Rezende Da Silva</td>
                        <td data-label="Sexo">masculino</td>
                        <td data-label="Email">thiagovaralllo@gmail.com</td>
                        <td data-label="Telefone">(12) 99600-4872</td>
                        <td data-label="Ações">
                            <a href="">
                                <img src="../img/icons/pen.svg" alt="editar usuario" style="width: 17px;">
                                <img src="../img/icons/trash.svg" alt="apagar usuario" style="width: 17px;">
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>

        </section>

    </main>
</body>
</html>