<?php
    require_once "function.php";
    historico();
    // movimentacao();
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login']))
      header("Location: ../index.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        </div>
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Funcionário</th>
                        <th>Entrou/Saiu</th>
                        <th>Quantidade</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($historicos) :
                        // var_dump($historicos);
                        foreach($historicos as $produto) : 
                        echo '<tr>';
                            // echo '<td>' . $produto['id_mov'] . '</td>';
                            echo '<td>' . $produto['Descricao'] . '</td>';
                            echo '<td>' . $produto['Funcionario'] . '</td>';
                            echo '<td>' . $produto['EntraSai'] . '</td>';
                            echo '<td>' . $produto['QntdModificada'] . '</td>';
                            echo '<td>' . $produto['Datas'] . '</td>';
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
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>