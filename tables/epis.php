<!DOCTYPE html>
    <?php
        require_once('function.php');
        indexEPI();
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
            <h2> ESTOQUE - EPI´s </h2>
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
                        <th>EPI</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Alterações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                    <?php foreach($produtos as $produto) : ?>
                        <tr>
                        <?php 
                            if ($produto['Tipo'] == '1') 
                            {
                                echo '<td>'.$produto['id_produto'].'</td>';
                                echo '<td>'.$produto['Descricao'].'</td>';
                                echo '<td>'.$produto['Tipo'].'</td>';
                                if($produto['Quantidade'] < 10 ){
                                    echo '<td>' . '<span class="vermelho">' . $produto['Quantidade'] . '</span>' . '</td>';
                                } else if ($produto['Quantidade'] <= 40){
                                        echo '<td>' . '<span class="amarelo">' . $produto['Quantidade'] . '</span>' . '</td>' ;
                                } else {
                                        echo '<td>' . '<span class="verde">' . $produto['Quantidade'] . '</span>' . '</td>';
                                }
                            ?>
                            <td class="changes">
                                <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-plus-circle'></i> Adicionar</a>
                                <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-minus-circle'></i> Retirar</a>
                                <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach ; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Nenhum registro encontrado.</td>
                        </tr>
                    <?php endif ; ?>
                </tbody>
                <!-- <tr>
                    <td>001</td>
                    <td>Óculos de segurança</td>
                    <td>EPI</td>
                    <td>
                        <?php
                            // for ($j = 0; $j < 1; $j++) {
                            //     $valor = rand(1,100);
                            // }
                            // if ($valor < 10) {
                            //     echo '<span class="vermelho">' . $valor . '</span>';
                            // } elseif ($valor >= 11 && $valor <= 40) {
                            //     echo '<span class="amarelo">' . $valor . '</span>';
                            // } else {
                            //     echo '<span class="verde">' . $valor . '</span>';
                            // }
                        ?>-->
            </table>
        </main>
    </body>

