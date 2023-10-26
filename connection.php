<?php 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=hotel_new","root", "mysql");
} catch (PDOException $e) {
    die("Não foi possível se conectar ao banco de dados $dbname :" . $e->getMessage());
}