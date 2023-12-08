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
        <?php //var_dump($fornecedor); ?>
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
                            <input type="text" id="cnpj" name="fornecedor[CNPJ]" placeholder="CNPJ do fornecedor" value="<?php echo $fornecedor['CNPJ']; ?>"><br><br>
                        </label>
                    </div>
                </div>
                <div class="btnFuncoes">
                    <div class="btnSalvar">
                        <button type="submit" name="" class="btn btn-primary">Salvar</button>
                    </div> 
                    <div class="btnCancela">
                        <a href="<?php echo BASEURL;?>tablesAdmin/tableFornecedor.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" ></script>
    <script src="<?php echo BASEURL; ?>js/index.js"></script>
    <script src="<?php echo BASEURL; ?>js/script.js"></script>
    <script src="<?php echo BASEURL; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL?>js/main.js"></script>
    <script>
  
    $('#cnpj').mask('00.000.000/0000-00', {reverse: true});

    </script>
</html>