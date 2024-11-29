<?php include 'header.php'; ?>

<div class="container">
    <h2>Adicionar Jogo</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label>Título:</label>
        <input type="text" name="titulo" required>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>

        <label>Ano de Lançamento:</label>
        <input type="text" name="ano" required>

        <label>Preço:</label>
        <input type="text" name="preco" required>

        <label>Disponível:</label>
        <input type="checkbox" name="disponivel" value="1" checked>

        <button type="submit" name="create">Adicionar jogo</button>
    </form>
</div>

</body>
</html>
