<?php include 'db.php'; ?>

<?php
if (isset($_POST['create'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;


    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    }

    $sql = "INSERT INTO jogos (titulo, descricao, ano, preco, disponivel, imagem) VALUES ('$titulo', '$descricao', '$ano', '$preco', '$disponivel', '$imagem')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    }

    if ($imagem) {
        $sql = "UPDATE jogos SET titulo='$titulo', descricao='$descricao', ano='$ano', preco='$preco', disponivel='$disponivel', imagem='$imagem' WHERE id=$id";
    } else {
        $sql = "UPDATE jogos SET titulo='$titulo', descricao='$descricao', ano='$ano', preco='$preco', disponivel='$disponivel' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM jogos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}

$conn->close();
?>
