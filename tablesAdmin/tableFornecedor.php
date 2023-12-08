<?php
        require_once('function.php');
        fornecedores();
        // filtragem();
        include(HEADER_TEMPLATE);
        if(!isset($_SESSION['login'])) {
            die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
        }
        if(!$_SESSION['isAdmin'] === "Sim"){
            die ("Você não pode acessar esta página porque não é o administrador.<p><a href=\"../telas/index.php\"> Voltar</a></p>");
        }
    ?>
<!DOCTYPE html>    
<html>
    <head>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleTbl.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
    </head>
    <body>
        <div class="tittle">

            <h2 class="titulos"><i class="fa-solid fa-truck-field"></i>&nbsp Fornecedores </h2>

            <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral dos fornecedores</p>
        </div>
        <div class="parte-superior">
            <div class="btnsAddGerar">
                <!-- <div class="gera-pdf">
                    <a class="botao-gerar" href="gera_pdf_epi.php"><button><i class="fa-solid fa-print" style="color: #ffffff;"></i>&nbsp Gerar Relatório</button></a>
                </div> -->
                <div class="btnAdd">
                    <a class="btnNewFornecedor" href="<?php echo BASEURL; ?>tablesAdmin/fornecedor.php"><button><i class="fa-solid fa-plus"></i>&nbsp Novo Fornecedor</button></a>
                </div>
            </div>
            <div class="filtro">
                <form action="tableFornecedor.php" method="POST">
                    <div class="actionsTbls">
                        <div class="input-Filtro">
                            <input class="btnFiltro" type="text" name="filtro" placeholder="Pesquise um fornecedor">
                        </div>
                        <div class="btnFiltro">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: white"></i></button>
                        </div>
                        <?php //var_dump($produtos);?>
                    </div>
                </form>
            </div>
        </div>
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($fornecedores) : ?>
                    <?php foreach($fornecedores as $fornecedor) : ?>
                        <tr>
                        <?php 
                                echo '<td>'.$fornecedor['id_fornecedor'].'</td>';
                                echo '<td>'. $fornecedor['Nome'] . '</td>';
                                echo '<td class="cnpj">' .  $fornecedor['CNPJ'] . '</td>'
                            ?>
                            <td class="changes">
                            <a href="editarFornecedor.php?id=<?php echo $fornecedor['id_fornecedor']; ?>" class="btn btn-transparent">&nbsp;&nbsp;<i class="fa fa-edit"></i>&nbsp; Editar</a>
                                <a href="editarFornecedor.php?id=<?php echo $fornecedor['id_fornecedor']; ?>" class="btn btn-transparent"><i class="fa-solid fa-trash"></i>&nbsp; Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Nenhum registro encontrado.</td>
                        </tr>
                    <?php endif ; ?>
                </tbody>
            </table>
        </main>

    </body>
    <script src="<?php echo BASEURL?>js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" ></script>
    <script>
  
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});

    </script>
<html>
