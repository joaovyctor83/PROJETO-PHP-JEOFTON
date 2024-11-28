<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<?php
// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para buscar os dados do filme com base no ID
    $sql = "SELECT * FROM filmes WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $filme = $result->fetch_assoc();
    } else {
        echo "Filme não encontrado!";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<div class="container">
    <h2>Editar Filme</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">
        
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo $filme['titulo']; ?>" required>

        <label>Descrição:</label>
        <textarea name="descricao" required><?php echo $filme['descricao']; ?></textarea>

        <label>Ano de Lançamento:</label>
        <input type="text" name="ano" value="<?php echo $filme['ano']; ?>" required>

        <label>Preço:</label>
        <input type="text" name="preco" value="<?php echo $filme['preco']; ?>" required>

        <label>Disponível:</label>
        <input type="checkbox" name="disponivel" value="1" <?php echo $filme['disponivel'] ? 'checked' : ''; ?>>

        <label>Imagem:</label>
        <input type="file" name="imagem" accept="image/*">
        <?php if ($filme['imagem']): ?>
            <p>Imagem Atual: <img src="<?php echo $filme['imagem']; ?>" width="100"></p>
        <?php endif; ?>

        <button type="submit" name="update">Atualizar Filme</button>
    </form>
</div>

<?php $conn->close(); ?>
</body>
</html>
