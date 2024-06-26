<?php
    include_once("conexao.php");
    require_once('function.php');
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }
    if(!$_SESSION['isAdmin'] === "Sim"){
        die ("Você não pode acessar esta página porque não é o administrador.<p><a href=\"../telas/index.php\"> Voltar</a></p>");
    }

    $id_funcionario = filter_input(INPUT_GET, 'id_funcionario', FILTER_SANITIZE_NUMBER_INT);
    $result_funcionario = "SELECT * FROM funcionario WHERE id_funcionario = '" . $_GET['id'] . "'";
    $resultado_funcionario = mysqli_query($conn, $result_funcionario);
    $row_produto = mysqli_fetch_assoc($resultado_funcionario);
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
        <?php //var_dump($row_produto); ?>
        <form class="tela-editar" method="POST" action="functions/editFuncionario.php" enctype="multipart/form-data">
            <div class="deixar-column">
                <div class="inputValues">
                    <input type="hidden" name="id_funcionario" value="<?php echo $row_produto['id_funcionario']; ?>">

                    <div class="Nome">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="Nome" value="<?php echo $row_produto['Nome']; ?>"><br><br>
                        </label>
                    </div>

                    <div class="Qtd">
                        <label for="Qtd">
                            Telefone:
                            <input type="text" id="phone" name="Telefone" placeholder="Digite a quantidade" value="<?php echo $row_produto['TelContato']; ?>"><br><br>
                        </label>
                    </div>

                    <div class="Modelo">
                        <label for="Modelo">
                            CPF:
                            <input type="text" id="cpf" name="CPF" placeholder="Digite o modelo" value="<?php echo $row_produto['CPF']; ?>"><br><br>
                        </label>
                    </div>
                </div>
                <div class="btnFuncoes">
                    <div class="btnSalvar">
                        <button type="submit" name="" class="btn btn-primary">Salvar</button>
                    </div> 
                    <div class="btnCancela">
                        <a href="<?php echo BASEURL;?>tablesAdmin/tableFuncionario.php">Cancelar</a>
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
        $('#phone').mask('(00) 0 0000-0000');  
        $('#cpf').mask('000.000.000-00', {reverse: true});
    </script>
</html>