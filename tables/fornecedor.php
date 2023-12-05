<?php
    session_start();
    require_once('function.php');
    add();
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
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="TituloARE">
            <h2 class="titulosare"><i class="fa fa-edit"></i>&nbsp Novo Fornecedor </h2>
        </div>
        <form class="tela-editar" method="POST" action="fornecedor.php" enctype="multipart/form-data">
            <div class="deixar-column">
                <div class="inputValues">
                    <div class="Nome">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="produto[Forncedor]" placeholder="Digite o Nome do Fornecedor"><br><br>
                        </label>
                    </div>

                    <div class="cnpj">
                        <label for="CNPJ">
                        CNPJ:
                            <input type="number" step="0.01" name="produto[CNPJ]" min="0.01" placeholder="Digite o CNPJ"><br><br>
                        </label>
                    </div>
                 </div>
            </div>
        </form>
        <div class="btnFuncoes01">
                    <div class="btnSalvar">
                        <button type="submit" name="" class="btn btn-primary">Salvar</button>
                    </div> 
                    <div class="btnCancela">
                        <a href="<?php echo BASEURL;?>tables/epis.php">Cancelar</a>
                    </div>
                </div>
    </body>
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>