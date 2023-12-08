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
            <h2 class="titulosare"><i class="fa fa-edit"></i>&nbsp Novo Produto </h2>
        </div>
        <form class="tela-editar" method="POST" action="adicionarProd.php" enctype="multipart/form-data">
            <div class="deixar-column">
                <div class="inputValues">
                    <input type="hidden" name="produto[id_produto]" value="">

                    <div class="Nome">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="produto[descricao]" placeholder="Digite o Nome"><br><br>
                        </label>
                    </div>

                    <div class="Qtd">
                        <label for="Qtd">
                        Quantidade:
                            <input type="number" step="1" name="produto[Quantidade]" min="1" placeholder="Digite a quantidade"><br><br>
                        </label>
                    </div>

                    <div class="Valor">
                        <label for="Valor">
                            Valor:
                            <input type="text" id="valor-input" step="0.01" name="produto[Valor]" min="0.01" placeholder="R$ 0,00"><br><br>
                        </label>
                    </div>

                    <div class="Modelo">
                        <label for="Modelo">
                            Modelo:
                            <input type="text" name="produto[Modelo]" placeholder="Digite o modelo" value=""><br><br>
                        </label>
                    </div>
                    <div class="Tipo">
                        <label for="Tipo">
                            Tipo:
                            <select type="text" name="produto[Tipo]">
                                <option value="1">EPI</option>
                                <option value="2">Insumo</option>
                            </select><br><br>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#valor-input').mask('R$ ##0,00', );
        });
    </script>
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>