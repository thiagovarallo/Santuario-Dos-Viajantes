<?php

session_start();

if (!isset($_SESSION["Logged"])) {
    header("Location: ../login.php");
}

if ($_SESSION["First_login"] == 1) {
    header("Location: /");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../../connection.php";

    $cpf = $_POST['CPF_user'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone_user'];
    $logadouro = $_POST['logadouro_user'];
    $numero = $_POST['num_user'];
    $bairro = $_POST['bairro_user'];
    $cidade = $_POST['cidade_user'];
    $estado = $_POST['estado_user'];
    $cep = $_POST['cep_user'];
    $pais = $_POST['pais'];

    $sql = "UPDATE users SET CPF=:cpf, sexo=:sexo, telefone=:telefone, logadouro=:logadouro, numero=:numero, bairro=:bairro, cidade=:bairro, estado=:bairro, cep=:bairro, pais=:bairro, first_login=1 WHERE email=:email; ";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':logadouro', $logadouro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':email', $_SESSION["Email"]);
    
        $stmt->execute();
    
        header("Location: /");
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insira seus dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <script src="src/js/navbar.js" defer></script>
</head>

<body>

    <?php include_once '../components/navbar.html' ?>

    <main>
        <div class="title_form">
            <h2>Insera seu dados para fazer o cadastro</h2>
        </div>

        <form class="row g-3 needs-validation" action="./insertDataUser.php" method="post" id="form" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="CPF_user" class="form-label" require>CPF</label>
                <input type="text" class="form-control" id="CPF_user" name="CPF_user" placeholder="Ex: luxo" maxlength="11" minlength="11" required>
            </div>
            <div class="col-md-6">
                <label for="CPF_user" class="form-label" require>Sexo</label>
                <select class="form-select" name="sexo" aria-label="Qual é seu sexo?">
                    <option selected>Qual é seu sexo?</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                    <option value="Prefiro_nao_Dizer">Prefiro não dizer</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="telefone_user" class="form-label" require>Telefone</label>
                <input type="tel" class="form-control" id="telefone_user" name="telefone_user" required>
            </div>

            <hr>

            <div class="col-md-6">
                <label for="logadouro_user" class="form-label" require>Logadouro</label>
                <input type="text" class="form-control" id="logadouro_user" name="logadouro_user" required>
            </div>
            <div class="col-md-6">
                <label for="num_user" class="form-label" require>Número</label>
                <input type="number" class="form-control" id="num_user" name="num_user" required>
            </div>
            <div class="col-md-6">
                <label for="bairro_user" class="form-label" require>Bairro</label>
                <input type="text" class="form-control" id="bairro_user" name="bairro_user" required>
            </div>
            <div class="col-md-6">
                <label for="cidade_user" class="form-label" require>Cidade</label>
                <input type="text" class="form-control" id="cidade_user" name="cidade_user" required>
            </div>
            <div class="col-md-6">
                <label for="estado_user" class="form-label" require>Estado</label>
                <select class="form-select" name="estado_user" aria-label="Selecione seu estado">
                    <option selected>Selecione o estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="cep_user" class="form-label" require>Cep</label>
                <input type="number" class="form-control" id="cep_user" name="cep_user"  required>
            </div>
            <div class="col-md-6">
                <label for="pais_user" class="form-label" require>País</label>
                <input type="text" class="form-control" id="pais_user" name="pais_user"  required>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Enviar dados</button>
                <button class="btn btn-danger" type="reset">Apagar tudo</button>
            </div>
        </form>
    </main>

    <?php include_once '../components/footer.html' ?>
</body>

</html>