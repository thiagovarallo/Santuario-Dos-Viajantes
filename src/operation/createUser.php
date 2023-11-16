<?php 
    include_once "../../connection.php";

    $name = $_GET['name'];
    $email = $_GET['email'];
    $password = $_GET['password'];

    $hash = password_hash($password, PASSWORD_ARGON2ID);

    $sql = "INSERT INTO users (name, email, password, role, first_login, CPF, sexo, telefone, logadouro, numero, bairro, cidade, estado, cep, pais) VALUES (:name, :email, :password, 'user', 0, null, null, null, null, null, null, null, null, null, null);";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $hash);

    $statement->execute();

    header("Location: /")

?>