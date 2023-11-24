<?php
    session_start();
    include_once("./conexao.php");
    require_once('./function.php');
    include(HEADER_TEMPLATE);
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleSubmit.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="TituloEdit">
            <h2 class="titulos"><i class="fa-solid fa-check"></i>&nbsp Ação feita com sucesso</h2>
            <a href="<?php echo BASEURL; ?>tables/epis.php">Clique aqui e retorne para a tela de EPI</a>
        </div>
    </body>
    <script src="<?php echo BASEURL?>js/script.js"></script>
</html>