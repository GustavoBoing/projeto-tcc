<?php
    ob_start();
    require_once('function.php');
    include(HEADER_TEMPLATE);
    addFuncionario();
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }
    if($_SESSION['login'] != "admin"){
        die ("Você não pode acessar esta página porque não é o administrador.<p><a href=\"../telas/index.php\"> Voltar</a></p>");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleSubmit.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/configuracoes.css">
        <title>Almoxarifado - Configurações</title>
    </head>
    <body>
        <div class="TituloARE">
            <h2 class="titulosare"><i class="fa fa-edit"></i>&nbsp Novo Funcionário </h2>
        </div>
        <form class="tela-editar" method="POST" action="funcionario.php" enctype="multipart/form-data">
            
        <div class="deixar-column">
                <div class="inputValues">

                    <div class="NomeFuncionario">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="funcionario[Nome]" placeholder="Nome do Colaborador"><br><br>
                        </label>
                    </div>

                    <div class="TelefoneFuncionario">
                        <label for="Telefone">
                            Telefone:
                            <input type="number" name="funcionario[telefone]" placeholder="Telefone do Colaborador"><br><br>
                        </label>
                    </div>
                    
                    <div class="CPFFuncionario">
                        <label for="CPF">
                            CPF:
                            <input type="number" name="funcionario[cpf]" placeholder="CPF do Colaborador"><br><br>
                        </label>
                    </div>
                </div>
                <div class="btnFuncoes">
                    <div class="btnSalvar">
                        <button type="submit" name="" class="btn btn-primary">Salvar</button>
                    </div> 
                    <div class="btnCancela">
                        <a href="<?php echo BASEURL;?>telas/index.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </body>
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>
<?php
    ob_end_flush();  // Descarrega o buffer de saída
?>