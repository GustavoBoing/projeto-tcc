<?php
    session_start();
    require_once('function.php');
    include(HEADER_TEMPLATE);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/configuracoes.css">
        <title>Almoxarifado - Configurações</title>
    </head>
    <body>
    <div class="tittle">
        <h2 class="titulos"><i class="bx bx-cog"></i>&nbsp Configurações </h2>
        <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral dos itens das configurações</p>
    </div>
    <main>
        <!-- <div class="btnsConfig">
            <div class="btnInsereProduto">
                <a href=""><button>Adicionar Produto</button></a>
            </div>
            <div class="btnInsereUsuario">
                <a href=""><button>Adicionar Usuário</button></a>
            </div>
        </div> -->
    </main>
    </body>
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>