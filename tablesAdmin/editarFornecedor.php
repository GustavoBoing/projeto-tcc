<?php
    // include_once("conexao.php");
    require_once('function.php');
    editFornecedor();
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }
    if(!$_SESSION['isAdmin'] === "Sim"){
        die ("Você não pode acessar esta página porque não é o administrador.<p><a href=\"../telas/index.php\"> Voltar</a></p>");
    }

    // $id_funcionario = filter_input(INPUT_GET, 'id_funcionario', FILTER_SANITIZE_NUMBER_INT);
    // $result_funcionario = "SELECT * FROM funcionario WHERE id_funcionario = '" . $_GET['id'] . "'";
    // $resultado_funcionario = mysqli_query($conn, $result_funcionario);
    // $row_produto = mysqli_fetch_assoc($resultado_funcionario);
?>
<!DOCTYPE html>

    <head>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleSubmit.css"/>
        <link rel="stylesheet" href="style.css"><link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
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
        <div class="TituloARE">
            <h2 class="titulosare"><i class="fa fa-edit"></i>&nbsp Editar Dados </h2>
        </div>
        <?php var_dump($fornecedor); ?>
        <form class="tela-editar" method="POST" action="editarFornecedor.php?id=<?php echo $fornecedor['id_fornecedor']; ?>">
            <div class="deixar-column">
                <div class="inputValues">
                    <input type="hidden" name="fornecedor[id_fornecedor]" value="<?php echo $fornecedor['id_fornecedor'] ?>">

                    <div class="Nome">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="fornecedor[Nome]" value="<?php echo $fornecedor['Nome'] ?>"><br><br>
                        </label>
                    </div>

                    <div class="Qtd">
                        <label for="Qtd">
                            CNPJ:
                            <input type="number" name="fornecedor[CNPJ]" placeholder="CNPJ do fornecedor" value="<?php echo $fornecedor['CNPJ']; ?>"><br><br>
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
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>