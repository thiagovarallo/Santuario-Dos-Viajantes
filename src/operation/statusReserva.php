<?php
    include_once "../../connection.php";

    $id = $_GET['id'];
    $email = $_GET['emailUser'];
    $typeRoom = $_GET['typeroom'];

    $sql = "UPDATE accommodation SET status='Reservado' WHERE Id_hospedagem=:id";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        header("Location: ".$_SERVER['HTTP_REFERER']."");

        exit();
    } catch (PDOException $e) {
        // Tratamento de erros
        echo "Erro ao executar a atualização: " . $e->getMessage();
    }


