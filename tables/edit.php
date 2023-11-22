<?php
session_start();

include_once("conexao.php");

$id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
$result_produto = "SELECT * FROM produto WHERE id_produto = '" . $_GET['id'] . "'";
$resultado_produto = mysqli_query($conn, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="TituloEdit">
        <h2 class="titulos"><i class='bx bx-hard-hat'></i>&nbsp Editar Dados </h2>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="proc_edit_prod.php">
            <input type="hidden" name="id" value="<?php echo $row_produto['id_produto']; ?>">

            <div class="Nome">
                <label for="Nome">
                    Nome:
                    <input type="text" name="descricao" value="<?php echo $row_produto['Descricao']; ?>"><br><br>
                </label>
            </div>

            <div class="Qtd">
                <label for="Qtd">
                    Quantidade:
                    <input type="text" name="quantidade" placeholder="Digite a quantidade" value="<?php echo $row_produto['Quantidade']; ?>"><br><br>
                </label>
            </div>

            <div class="Valor">
                <label for="Valor">
                    Valor:
                    <input type="text" name="valor" placeholder="Digite o valor" value="<?php echo $row_produto['Valor']; ?>"><br><br>
                </label>
            </div>

            <div class="Modelo">
                <label for="Modelo">
                    Modelo:
                    <input type="text" name="modelo" placeholder="Digite o modelo" value="<?php echo $row_produto['Modelo']; ?>"><br><br>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="submit" class="btn btn-primary">Cancelar</button>
        </form>
    </div>
</body>

</html>