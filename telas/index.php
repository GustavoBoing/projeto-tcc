<!DOCTYPE html>
<?php
    require_once "../config.php";
    include(HEADER_TEMPLATE);
?>

<html>
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleIndex.css"/>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Almoxarifado</title>
    </head>
    <body>
        <header>
            <div class="text" style="padding-left:16px">
                <h2><i class="fa-brands fa-uncharted fa-lg"></i> &nbsp; Página Inicial</h2>
                <p id="subtitulo">Visão geral do Almoxarifado</p>
            </div>
        </header>
        <main>
            <div class="boxes">
                <div id="caixa01" class="box">
                    <span>01</span>
                    <h3>Pouco Quantidade</h3>
                    <p></p>
                </div>
                <div id="caixa02" class="box">
                    <span>02</span>
                    <h3>Grande Quantidade</h3>
                    <p></p>
                </div>
                <div id="caixa03" class="box">
                    <span>03</span>
                    <h3>Mais Utilizados</h3>
                    <p></p>
                </div>
            </div>
        </main>
        <script src="<?php echo BASEURL; ?>js/script.js"></script>
    </body>
</html>