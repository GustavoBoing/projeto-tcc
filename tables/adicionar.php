<?php
    session_start();

    include_once("./conexao.php");
    require_once('./function.php');
    indexEPI();
    include(HEADER_TEMPLATE);

    $id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
    $result_produto = "SELECT * FROM produto WHERE id_produto = '" . $_GET['id'] . "'";
    $resultado_produto = mysqli_query($conn, $result_produto);
    $row_produto = mysqli_fetch_assoc($resultado_produto);
?>
<!DOCTYPE html>
    <head>
            <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
            <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <body>
        <div class="TituloEdit">
            <h2 class="titulos"><i class='bx bx-hard-hat'></i>&nbsp Editar Dados </h2>
        </div>
        <form class="tela-editar" method="POST" action="functions/add.php" enctype="multipart/form-data">
            <div class="deixar-column">
                <div class="inputValues">
                    <input type="hidden" name="id_produto" value="<?php echo $row_produto['id_produto']; ?>">

                    <div class="Nome">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="descricao" value="<?php echo $row_produto['Descricao']; ?>" disabled><br><br>
                        </label>
                    </div>

                    <div class="Qtd">
                        <label for="Qtd">
                            Quantidade:
                            <input type="number" name="quantidade_a_somar" placeholder="Digite a quantidade"><br><br>
                        </label>
                    </div>

                    <div class="Valor">
                        <label for="Valor">
                            Valor:
                            <input type="number" step="0.01" name="valor" min="0.01" placeholder="Digite o valor" value="<?php echo $row_produto['Valor']; ?>" disabled><br><br>
                        </label>
                    </div>

                    <div class="Modelo">
                        <label for="Modelo">
                            Modelo:
                            <input type="text" name="modelo" placeholder="Digite o modelo" value="<?php echo $row_produto['Modelo']; ?>" disabled><br><br>
                        </label>
                    </div>
                </div>
                <div class="btnFuncoes">
                    <div class="btnSalvar">
                        <button type="submit" name="" class="btn btn-primary">Salvar</button>
                    </div> 
                    <div class="btnCancela">
                        <a href="<?php echo BASEURL;?>tables/epis.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>