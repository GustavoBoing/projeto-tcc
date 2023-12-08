<?php
    require_once "function.php";
    // filterData();
    historico();
    // movimentacao();
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }
?>

<!DOCTYPE html>

<html>
    <head>
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>css/historico.css"/>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Almoxarifado</title>
    </head>
    <body>
        <div class="tittle">
            <h2 class="titulos"><i class="fa-solid fa-clock-rotate-left"></i> &nbsp; Histórico</h2>
            <p id="subtitulo">Visão geral das últimas transações</p>
            <?php //var_dump($historicos);?>
        </div>

        <!-- <div class="filtro">
            <form action="historico.php" method="POST">
                <div class="actionsTbls">
                    <div class="input-Filtro">
                        <input class="btnFiltro" type="text" name="filtro" placeholder="Pesquise um produto">
                    </div>
                    <div class="btnFiltro">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: white"></i></button>
                    </div>
                    <?php //var_dump($produtos);?>
                </div>
            </form>
        </div> -->

        <?php //var_dump($historicos);?>

        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Funcionário</th>
                        <th>Usuário</th>
                        <th>Qtd. Modificada</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if ($historicos) :
                        //var_dump($historicos);
                        // $dataFormatada = date("d/m/Y H:i:s", strtotime($produto['Data']));
                        foreach($historicos as $produto) : 
                        echo '<tr>';
                            // echo '<td>' . $produto['id_mov'] . '</td>';
                            echo '<td>' . $produto['Descricao'] . '</td>';
                            if($produto['Funcionario_id'] === NULL){
                                echo '<td>' . $produto['Login'] . '</td>';
                            } else {
                                echo '<td>' . $produto['Nome'] . '</td>';
                            }
                            echo '<td>' . $produto['Login'] . '</td>';
                            echo '<td>' . $produto['QntdModificada'] . '</td>';
                            echo '<td>' . date("d/m/Y H:i:s", strtotime($produto['Data'])) . '</td>';
                        echo '</tr>';
                        endforeach ; 
                        else :
                        echo '<tr>';
                            echo '<td colspan="7">Nenhum registro encontrado.</td>';
                        echo '</tr>';
                    endif ; ?>
                </tbody>
            </table>
        </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/index.js"></script>
    <script src="<?php echo BASEURL; ?>js/script.js"></script>
    <script src="<?php echo BASEURL; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL?>js/main.js"></script>
</html>