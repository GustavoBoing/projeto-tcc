<!DOCTYPE html>
    <?php
        require_once('function.php');
        indexINS();
        include(HEADER_TEMPLATE);
    ?>
<html>
    <head>
        <link rel="stylesheet" href="styleTbl.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <script src="<?php echo BASEURL; ?>inc/script.js"defer></script>
    </head>
    <body>
        <header>
            <h2>&nbsp <i class='bx bx-grid-alt' id="icons"></i>&nbsp &nbsp ESTOQUE - INSUMOS </h2>
            <hr>
            <!-- <div id="botoes">
                <div class="pill-nav" id="adicionar">
                    <a href="#contact">Adicionar</a>
                </div>
                <div class="pill-nav" id="editar">
                    <a href="#about">Editar</a>
                </div>
            </div> -->
        </header>
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
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
                                    echo '<td>'.$produto['id_produto'].'</td>';
                                    echo '<td>'.$produto['Descricao'].'</td>';
                                    if($produto['Quantidade'] < 10 ){
                                        echo '<td>' . '<span class="vermelho">' . number_format($produto['Quantidade'], 2, ',', '.') . '</span>' . '</td>';
                                    } else if ($produto['Quantidade'] <= 40){
                                         echo '<td>' . '<span class="amarelo">' . number_format($produto['Quantidade'], 2, ',', '.') . '</span>' . '</td>' ;
                                    } else {
                                         echo '<td>' . '<span class="verde">' . number_format($produto['Quantidade'], 2, ',', '.') . '</span>' . '</td>';
                                    }
                                    echo '<td>'. 'R$ ' . $produto['Valor'].'</td>';
                                    echo '<td>' . 'R$ ' . number_format($produto['Valor'] * $produto['Quantidade'], 2, ',', '.') . '</td>'
                                ?>
                                <td class="changes">
                                    <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-plus-circle'></i> Adicionar</a>
                                    <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-minus-circle'></i> Retirar</a>
			                        <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach ; ?>    
                    <?php endif ; ?>
                </tbody>
            </table>
        </main>
    </body>
</html>
