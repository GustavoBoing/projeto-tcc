<!DOCTYPE html>
    <?php
        require_once "../config.php";
        include(HEADER_TEMPLATE);
    ?>
<html>
    <head>
        <link rel="stylesheet" href="style.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <br>
        <h2> ESTOQUE - EPI´s </h2>
        <hr>
        <br> 

            <div class="pill-nav">
                 <a href="#adicionar">Adicionar</a>
                 <a href="#editar">Editar</a>
            </div>

        
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tr>
                <td>001</td>
                <td>Óculos de segurança</td>
                <td>EPI</td>
                <td>
                    <?php
                        for ($j = 0; $j < 1; $j++) {
                            $valor = rand(1,100);
                        }
                        if ($valor < 10) {
                            echo '<span class="vermelho">' . $valor . '</span>';
                        } elseif ($valor >= 11 && $valor <= 40) {
                            echo '<span class="amarelo">' . $valor . '</span>';
                        } else {
                            echo '<span class="verde">' . $valor . '</span>';
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>002</td>
                <td>Capacetes</td>
                <td>EPI</td>
                <td>
                    <?php
                        for ($j = 0; $j < 1; $j++) {
                            $valor = rand(1,100);
                        }
                        if ($valor < 10) {
                            echo '<span class="vermelho">' . $valor . '</span>';
                        } elseif ($valor >= 11 && $valor <= 40) {
                            echo '<span class="amarelo">' . $valor . '</span>';
                        } else {
                            echo '<span class="verde">' . $valor . '</span>';
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>003</td>
                <td>Luvas</td>
                <td>EPI</td>
                <td>
                    <?php
                        for ($j = 0; $j < 1; $j++) {
                            $valor = rand(1,100);
                        }
                        if ($valor < 10) {
                            echo '<span class="vermelho">' . $valor . '</span>';
                        } elseif ($valor >= 11 && $valor <= 40) {
                            echo '<span class="amarelo">' . $valor . '</span>';
                        } else {
                            echo '<span class="verde">' . $valor . '</span>';
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>004</td>
                <td>Mascaras</td>
                <td>EPI</td>
                <td>
                    <?php
                        for ($j = 0; $j < 1; $j++) {
                            $valor = rand(1,100);
                        }
                        if ($valor < 10) {
                            echo '<span class="vermelho">' . $valor . '</span>';
                        } elseif ($valor >= 11 && $valor <= 40) {
                            echo '<span class="amarelo">' . $valor . '</span>';
                        } else {
                            echo '<span class="verde">' . $valor . '</span>';
                        }
                    ?>
                </td>
            </tr>
        </table>
    </body>

