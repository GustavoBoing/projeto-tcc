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
            <h2> ESTOQUE - INSUMOS </h2>
            <hr>
            <div id="botoes">
                <div class="pill-nav" id="adicionar">
                    <a href="#contact">Adicionar</a>
                </div>
                <div class="pill-nav" id="editar">
                    <a href="#about">Editar</a>
                </div>
            </div>
        </header>
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Insumo</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                        <?php foreach($produtos as $produto) :?>
                            <tr>
                                <td><?php echo $produto['id_produto']?></td>
                                <td><?php echo $produto['Descricao']?></td>
                                <td><?php echo $produto['Tipo']?></td>
                                <td><?php if($produto['Quantidade'] < 10 ){
                                    echo '<span class="vermelho">' . $produto['Quantidade'] . '</span>';
                                } elseif ($produto['Quantidade'] <= 40){
                                    echo '<span class="amarelo">' . $produto['Quantidade'] . '</span>';
                                } else {
                                    echo '<span class="verde">' . $produto['Quantidade'] . '</span>';
                                }
                                ?></td>
                            </tr>
                        <?php endforeach ; ?>    
                    <?php endif ; ?>
                </tbody>
            </table>
        </main>
    </body>
</html>
