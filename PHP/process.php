<?php include 'db.php'; ?>

<?php
// Processar a criação de um novo filme
if (isset($_POST['create'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    // Upload da imagem
    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    }

    $sql = "INSERT INTO filmes (titulo, descricao, ano, preco, disponivel, imagem) VALUES ('$titulo', '$descricao', '$ano', '$preco', '$disponivel', '$imagem')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}

// Processar a atualização de um filme existente
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    // Verificar se uma nova imagem foi enviada
    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    }

    if ($imagem) {
        $sql = "UPDATE filmes SET titulo='$titulo', descricao='$descricao', ano='$ano', preco='$preco', disponivel='$disponivel', imagem='$imagem' WHERE id=$id";
    } else {
        $sql = "UPDATE filmes SET titulo='$titulo', descricao='$descricao', ano='$ano', preco='$preco', disponivel='$disponivel' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}

// Processar a exclusão de um filme
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Deleta o filme com base no ID
    $sql = "DELETE FROM filmes WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}

$conn->close();
?>
