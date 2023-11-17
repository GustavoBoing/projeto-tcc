<?php
    session_start();

    include_once("conexao.php");

    $id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
    $result_produto = "SELECT * FROM produto WHERE id_produto = '$id_produto'";
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
        <div class="container mt-3">
            <h2>Editar dados</h2>
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <form method="POST" action="proc_edit_prod.php">
			    <input type="hidden" name="id" value="<?php echo $row_produto['id_produto']; ?>">

                <div class="mb-3 mt-3">
                    <label>Nome:</label>
                    <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>"><br><br>
                </div>

                <div class="mb-3">
                    <label>Quantidade:</label>
			        <input type="text" name="quantidade" placeholder="Digite a quantidade" value="<?php echo $row_produto['quantidade']; ?>"><br><br>
                </div>
                
                <div class="mb-3">
                    <label>Valor: </label>
			        <input type="text" name="valor" placeholder="Digite o valor" value="<?php echo $row_produto['valor']; ?>"><br><br>
                </div>

                <div class="mb-3">
                    <label>Modelo: </label>
			        <input type="text" name="modelo" placeholder="Digite o modelo" value="<?php echo $row_produto['modelo']; ?>"><br><br>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
