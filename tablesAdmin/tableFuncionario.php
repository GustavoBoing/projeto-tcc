<?php
        require_once('function.php');
        funcionarios();
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

            <h2 class="titulos"><i class="fa-solid fa-people-group" ></i>&nbsp Colaboradores </h2>

            <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral dos colaboradores</p>
        </div>
        <div class="parte-superior">
            <div class="btnsAddGerar">
                <!-- <div class="gera-pdf">
                    <a class="botao-gerar" href="gera_pdf_epi.php"><button><i class="fa-solid fa-print" style="color: #ffffff;"></i>&nbsp Gerar Relatório</button></a>
                </div> -->
                <div class="btnAdd">
                    <a class="btnNewFornecedor" href="<?php echo BASEURL; ?>tablesAdmin/funcionario.php"><button><i class="fa-solid fa-plus"></i>&nbsp Novo Colaborador</button></a>
                </div>
            </div>
            <div class="filtro">
                <form action="tableFuncionario.php" method="POST">
                    <div class="actionsTbls">
                        <div class="input-Filtro">
                            <input class="btnFiltro" type="text" name="filtro" placeholder="Pesquise um colaborador">
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
                        <th>Telefone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($funcionarios) : ?>
                    <?php foreach($funcionarios as $produto) : ?>
                        <tr>
                            <?php 
                                echo '<td>'.$produto['id_funcionario'].'</td>';
                                echo '<td>'. $produto['Nome'] . '</td>';
                                echo '<td>' .  $produto['TelContato'] . '</td>'
                            ?>
                            <td class="changes">
                                <a href="excluir.php?id=<?php echo $produto['id_funcionario']; ?>" class="btn btn-sm btn-light"><i class="fa-solid fa-trash"></i>&nbsp; Excluir</a>
                                <a href="editarFuncionario.php?id=<?php echo $produto['id_funcionario']; ?>" class="btn btn-sm btn-light">&nbsp;&nbsp;<i class="fa fa-edit"></i>&nbsp; Editar</a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">Nenhum registro encontrado.</td>
                        </tr>
                    <?php endif ; ?>
                </tbody>
            </table>
        </main>

    </body>
    <script src="<?php echo BASEURL?>js/script.js"></script>
<html>
