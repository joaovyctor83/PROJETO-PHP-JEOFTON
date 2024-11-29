<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM jogos WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $jogo = $result->fetch_assoc();
    } else {
        echo "jogo não encontrado!";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<div class="container">
    <h2>Editar jogo</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $jogo['id']; ?>">
        
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo $jogo['titulo']; ?>" required>

        <label>Descrição:</label>
        <textarea name="descricao" required><?php echo $jogo['descricao']; ?></textarea>

        <label>Ano de Lançamento:</label>
        <input type="text" name="ano" value="<?php echo $jogo['ano']; ?>" required>

        <label>Preço:</label>
        <input type="text" name="preco" value="<?php echo $jogo['preco']; ?>" required>

        <label>Disponível:</label>
        <input type="checkbox" name="disponivel" value="1" <?php echo $jogo['disponivel'] ? 'checked' : ''; ?>>
        <br>
        <button type="submit" name="update">Atualizar jogo</button>
    </form>
</div>

<?php $conn->close(); ?>
</body>
</html>
