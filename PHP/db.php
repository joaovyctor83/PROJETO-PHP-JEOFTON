<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root'; // usuário do banco
$password = ''; // senha do banco
$dbname = 'locadora';

// Conectando ao MySQL
$conn = new mysqli($host, $user, $password);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o banco de dados existe, se não, cria o banco
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Seleciona o banco de dados
    $conn->select_db($dbname);

    // Criação da tabela de filmes, se não existir
    $sql = "CREATE TABLE IF NOT EXISTS filmes (
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
