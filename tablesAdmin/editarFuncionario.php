<?php

    include_once("conexao.php");
    require_once('function.php');
    editFuncionario();
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }
    if(!$_SESSION['isAdmin'] === "Sim"){
        die ("Você não pode acessar esta página porque não é o administrador.<p><a href=\"../telas/index.php\"> Voltar</a></p>");
    }

    // $id_funcionario = filter_input(INPUT_GET, 'id_funcionario', FILTER_SANITIZE_NUMBER_INT);
    // $result_produto = "SELECT * FROM funcionario WHERE id_funcionario = '" . $_GET['id'] . "'";
    // $resultado_produto = mysqli_query($conn, $result_produto);
    // $row_produto = mysqli_fetch_assoc($resultado_produto);
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
        // if (isset($_SESSION['msg'])) {
        //     echo $_SESSION['msg'];
        //     unset($_SESSION['msg']);
        // }
    ?>
    <body>
        <div class="TituloARE">
            <h2 class="titulosare"><i class="fa fa-edit"></i>&nbsp Editar Dados </h2>
        </div>
        <form class="tela-editar" method="POST" action="editarFuncionario.php?id=<?php echo $produto['id_funcionario']; ?>" enctype="multipart/form-data">
            <div class="deixar-column">
                <div class="inputValues">
                    <input type="hidden" name="funcionario[id_funcionario]" value="<?php echo $produto['id_funcionario']; ?>">

                    <div class="Nome">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="funcionario[Nome]" value="<?php echo $produto['Nome']; ?>"><br><br>
                        </label>
                    </div>

                    <div class="Modelo">
                        <label for="Modelo">
                            Telefone:
                            <input type="text" name="funcionario[TelContato]" placeholder="Digite o modelo" value="<?php echo $row_produto['TelContato']; ?>"><br><br>
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
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>