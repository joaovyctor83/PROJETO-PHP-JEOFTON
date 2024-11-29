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
        echo "Jogo não encontrado!";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<div class="container">
    <h2>Excluir Jogo</h2>
    <p>Realmente deseja excluir o jogo <strong><?php echo $jogo['titulo']; ?></strong>?</p>

    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $jogo['id']; ?>">
        <button type="submit" name="delete">Excluir</button>
        <a href="index.php">Cancelar</a>
    </form>
</div>

<?php $conn->close(); ?>
</body>
</html>
