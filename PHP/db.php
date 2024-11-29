<?php
$host = 'localhost';
$user = 'root'; 
$password = ''; 
$dbname = 'jogos';

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);

    $sql = "CREATE TABLE IF NOT EXISTS jogo (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(100) NOT NULL,
        descricao TEXT NOT NULL,
        ano INT(4) NOT NULL,
        preco DOUBLE(6, 2) NOT NULL,
        disponivel BOOLEAN NOT NULL,
        imagem VARCHAR(255) DEFAULT NULL
    )";

    if ($conn->query($sql) === FALSE) {
        die("Erro na criação da tabela: " . $conn->error);
    }
} else {
    die("Erro ao criar banco de dados: " . $conn->error);
}
?>
