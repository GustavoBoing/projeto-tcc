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
        <link rel="stylesheet" href="styleTbl.css"/>
        <link rel="stylesheet" href="style.css"><link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="TituloEdit">
            <h2 class="titulos"><i class='bx bx-hard-hat'></i>&nbsp Editar Dados </h2>
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <form method="POST" action="proc_edit_prod.php">
			    <input type="hidden" name="id" value="<?php echo $row_produto['id_produto']; ?>">

                <div class="Nome">
                    <label for="Nome">
                        Nome:
                    <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>"><br><br>
                    </label>
                </div>

                <div class="Qtd">
                    <label for="Qtd">
                        Quantidade:
			        <input type="text" name="quantidade" placeholder="Digite a quantidade" value="<?php echo $row_produto['quantidade']; ?>"><br><br>
                    </label>
                </div>
                
                <div class="Valor">
                    <label for="Valor">
                        Valor:
			        <input type="text" name="valor" placeholder="Digite o valor" value="<?php echo $row_produto['valor']; ?>"><br><br>
                    </label>
                </div>

                <div class="Modelo">
                    <label for="Modelo">
                        Modelo:
			        <input type="text" name="modelo" placeholder="Digite o modelo" value="<?php echo $row_produto['modelo']; ?>"><br><br>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
