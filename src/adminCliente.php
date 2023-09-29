<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">

</head>
<body>

    <?php include_once './components/navbarAdmin.html' ?>


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