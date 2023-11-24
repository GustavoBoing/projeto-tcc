<?php
    require_once('function.php');
    indexINS();
    include(HEADER_TEMPLATE);
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
            <div class="gera-pdf">
                <a class="botao-gerar" href="gera_pdf_ins.php"><button><i class="fa-solid fa-print" style="color: #ffffff;"></i>&nbsp Gerar Relatório</button></a>
            </div>
            <div class="filtro">
                <form action="insumos.php" method="POST">
                    <label for="">Filtro</label>
                    <input class="filtro" type="text" name="filtro">
                    <input type="submit" value="buscar">
                    <?php //var_dump($produtos);?>
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
                                    if($produto['Quantidade'] < 10 ){
                                        echo '<td>' . '<span class="vermelho">' . $produto['Quantidade'] . '</span>' . '</td>';
                                    } else if ($produto['Quantidade'] <= 40){
                                         echo '<td>' . '<span class="amarelo">' . $produto['Quantidade'] . '</span>' . '</td>' ;
                                    } else {
                                         echo '<td>' . '<span class="verde">' . $produto['Quantidade'] . '</span>' . '</td>';
                                    }
                                    echo '<td>'. 'R$ ' . $produto['Valor'].'</td>';
                                    echo '<td>' . 'R$ ' . number_format($produto['Valor'] * $produto['Quantidade'], 2, ',', '.') . '</td>'
                                ?>
                                <td class="changes">
                                <a href="adicionar.php?id=<?php echo $produto['id_produto']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-plus-circle'></i> Adicionar</a>
                                <a href="retirar.php?id=<?php echo $produto['id_produto']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-minus-circle'></i> Retirar</a>
                                <a href="editIns.php?id=<?php echo $produto['id_produto']; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Editar</a>
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
    <script src="<?php echo BASEURL; ?>inc/script.js"defer></script>
</html>
