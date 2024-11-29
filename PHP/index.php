<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<div class="container">
    <h2>Jogos Cadastrados</h2>
    <table>
        <tr>
            <th>Nome do jogo</th>
            <th>Descrição</th>
            <th>Ano</th>
            <th>Preço</th>
            <th>Disponível</th>
        </tr>
        <?php
        $sql = "SELECT * FROM jogos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['titulo'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['ano'] . "</td>";
                echo "<td>" . $row['preco'] . "</td>";
                echo "<td>" . ($row['disponivel'] ? 'Sim' : 'Não') . "</td>";
                echo "<td><a href='update.php?id=" . $row['id'] . "'>Editar</a> | <a href='delete.php?id=" . $row['id'] . "'>Excluir</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Jogo não encontrado</td></tr>";
        }
        ?>
    </table>
</div>

<?php $conn->close(); ?>
</body>
</html>
