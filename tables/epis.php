<!DOCTYPE html>
    <?php
        require_once('function.php');
        index();
        include(HEADER_TEMPLATE);
    ?>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./tables/styleTbl.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./inc/style.css"/>
    </head>
    <body>
        <header>
            <h2> ESTOQUE - EPI´s </h2>
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
                        <th>Produto</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                    <?php foreach($produtos as $produto) : ?>
                        <tr>
                            <td><?php echo $produto['id_produto']?></td>
                            <td><?php echo $produto['Descricao']?></td>
                            <td><?php echo $produto['Tipo']?></td>
                            <td><?php echo $produto['Quantidade']?></td>
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
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Capacetes</td>
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
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Luvas</td>
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
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Mascaras</td>
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
                        ?>
                    </td>
                </tr> -->
            </table>
        </main>
    </body>

