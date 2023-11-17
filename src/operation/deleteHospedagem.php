<?php
include_once "../../connection.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


if ($id !== false) {
    $sql = "DELETE FROM accommodation WHERE Id_hospedagem = :id";

    try {
        $statement = $pdo->prepare($sql);
        
        $statement->bindValue(':id', $id);
        $statement->execute();

        header("Location: ".$_SERVER['HTTP_REFERER']."");
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Parâmetros inválidos.';
}
?>