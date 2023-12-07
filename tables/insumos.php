<?php
    require_once('function.php');
    indexINS();
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
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
            <h2 class="titulos"><i class='bx bx-grid-alt'></i>&nbsp Insumos </h2>
            <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral dos itens de Insumo</p>
        </div>
        <div class="parte-superior">
            <div class="btnsAddGerar">
                <div class="gera-pdf">
                    <a class="botao-gerar" href="gera_pdf_ins.php"><button><i class="fa-solid fa-print" style="color: #ffffff;"></i>&nbsp Gerar Relatório</button></a>
                </div>
                <?php 
                if($_SESSION['isAdmin'] === "Sim"){?>
                <div class="btnAdd">
                    <a class="btnNewProd" href="<?php echo BASEURL; ?>tables/AdicionarProd.php"><button><i class="fa-solid fa-plus"></i>&nbsp Novo Produto</button></a>
                </div>
                <?php } ?>
            </div>
            <div class="filtro">
                <form class="filtar" action="insumos.php" method="POST">
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
            </div>
        </div>
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Insumo</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor em Estoque</th>
                        <th>Alterações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                        <?php foreach($produtos as $produto) :?>
                            <tr>
                                <?php 
                                if ($produto['Tipo'] == '2') 
                                {
                                    echo '<td>'.$produto['Descricao'].'</td>';
                                    if($produto['Quantidade'] === null ) {
                                        echo '<td>' . '<span class="vermelho">' . "0" . '</span>' . '</td>';
                                    }
                                    else if ($produto['Quantidade'] < 10 ){
                                        echo '<td>' . '<span class="vermelho">' . $produto['Quantidade'] . '</span>' . '</td>';
                                    } else if ($produto['Quantidade'] <= 40){
                                         echo '<td>' . '<span class="amarelo">' . $produto['Quantidade'] . '</span>' . '</td>' ;
                                    } else {
                                         echo '<td>' . '<span class="verde">' . $produto['Quantidade'] . '</span>' . '</td>';
                                    }
                                    echo '<td>'. 'R$ ' . number_format($produto['Valor'], 2, ',', '.').'</td>';
                                    echo '<td>' . 'R$ ' . number_format($produto['Valor'] * $produto['Quantidade'], 2, ',', '.') . '</td>'
                                ?>
                                <td class="changes">
                                    <a href="adicionarIns.php?id=<?php echo $produto['id_produto']; ?> " class="btn btn-transparent"><i class='bx bx-plus-circle'></i> Adicionar</a>
                                    <a href="retirarIns.php?id=<?php echo $produto['id_produto']; ?>" class="btn btn-transparent"><i class='bx bx-minus-circle'></i> Retirar</a>
                                    <?php
                                    if($_SESSION['isAdmin'] === "Sim"){?>
                                        <a href="editIns.php?id=<?php echo $produto['id_produto']; ?>" class="btn btn-transparent"><i class="fa fa-edit"></i> Editar</a>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach ; ?>    
                    <?php endif ; ?>
                </tbody>
            </table>
        </main>

   
    </body>
    <script src="<?php echo BASEURL ?>js/tabelas.js"></script>
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>
