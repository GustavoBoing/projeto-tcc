<!DOCTYPE html>
    <?php
        require_once "../config.php";
        include(HEADER_TEMPLATE);
    ?>
<html>
    <head>
        <link rel="stylesheet" href="styleTbl.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <br>
        <h2> ESTOQUE - INSUMOS </h2>
        <hr>
        <br> 
        
            <div class="pill-nav">
                <a href="#contact">Adicionar</a>
                <a href="#about">Editar</a>
            </div>
        </div>
        
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Disco de Corte 4" 1/2</td>
                    <td>Disco</td>
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
                <td>2</td>
                    <td>Disco de Corte 7"</td>
                    <td>Disco</td>
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
                    <td>1</td>
                    <td>Disco de Flap 4" 1/2</td>
                    <td>Disco</td>
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
            </tbody>
        </table>
    </body>
</html>
