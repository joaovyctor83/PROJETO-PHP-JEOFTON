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
    <h2>Excluir Jogo</h2>
    <p>Realmente deseja excluir o jogo <strong><?php echo $filme['titulo']; ?></strong>?</p>

    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">
        <button type="submit" name="delete">Excluir</button>
        <a href="index.php">Cancelar</a>
    </form>
</div>

<?php $conn->close(); ?>
</body>
</html>
