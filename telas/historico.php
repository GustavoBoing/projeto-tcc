<!DOCTYPE html>
<?php
    require_once "function.php";
    indexEPI();
    include(HEADER_TEMPLATE);
?>

<html>
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>css/historico.css"/>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
                <script src="<?php echo BASEURL; ?>inc/script.js"defer></script>
        
        
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Almoxarifado</title>
    </head>
    <body>
        <!-- <div class="text" style="padding-left:16px">
            <h2><i class="fa-solid fa-clock-rotate-left"></i> &nbsp; Histórico</h2>
            <p id="subtitulo">Visão geral das últimas transações</p>
        </div> -->
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Funcionário</th>
                        <th>Entrou/Saiu</th>
                        <th>Quantidade</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                    <?php foreach($produtos as $produto) : ?>
                        <tr>
                            <td><?php echo $produto['id_mov']?></td>
                            <td><?php echo $produto['Produto_id']?></td>
                            <td><?php echo $produto['Funcionario']?></td>
                            <td><?php echo $produto['EntraSai']?></td>
                            <td><?php echo $produto['QntdModificada']?></td>
                            <td><?php echo $produto['Datas']?></td>
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
        <script src="script.js"></script>
    </body>
</html>