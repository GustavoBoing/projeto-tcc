<?php
    require_once "../config.php";
    require_once('function.php');
    grandeQtd();
    poucaQtd();
    maisUtilizados();
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
      die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
  }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleIndex.css"/>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Almoxarifado - Tela Inicial</title>
    </head>
    <body>
      <div class="tittleIndex">
        <h2 class="tituloIdx"><i class="fa-brands fa-uncharted fa-lg"></i> &nbsp; Página Inicial</h2>
        <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral do Almoxarifado</p>
      </div>
      <main>
        <div id="boxes" class="boxes">
          <div class="hidden">
            <div id="caixa01" class="box">
              <h3><i class="fa-regular fa-file-lines"></i>&nbsp; &nbsp;Grande quantidade</h3>
              <?php
                if ($produtos) :
                  // var_dump($produtos);
                  echo '<ol style="margin: 10px 0 0 15px; font-size:17px; color: var(--search-text);">';
                  foreach ($produtos as $produto) :
                    echo '<li style="margin: 2px 0 0 0;">' . $produto['Descricao'] . ' - ' . $produto['Quantidade'] . ' unidades ' . '</li>';
                  endforeach;
                  echo '</ol>';
                else :
                  echo 'Nenhum produto está com quantidade maior que 35 unidades.';
                endif;
              ?>
            </div>
          </div>
          <div class="hidden">
            <div id="caixa02" class="box">
              <h3><i class="fa-solid fa-file-lines"></i>&nbsp; &nbsp;Baixa quantidade</h3>
              <?php
                if ($poucos) :
                  echo '<ol style="margin: 10px 0 0 15px; font-size:17px; color: var(--search-text);">';
                  foreach ($poucos as $produto) :
                    if($produto['Quantidade'] === null){
                      echo '<li style="margin: 2px 0 0 0;">' . $produto['Descricao'] . ' - ' . "0" . ' unidades ' . '</li>';
                    }else {
                      echo '<li style="margin: 2px 0 0 0;">' . $produto['Descricao'] . ' - ' . $produto['Quantidade'] . ' unidades ' . '</li>';
                    }
                  endforeach;
                  echo '</ol>';
                else :
                  echo 'Nenhum produto está com quantidade menor que 10 unidades.';
                endif;
              ?>
            </div>
          </div>
          <div class="hidden">
            <div id="caixa03" class="box">
              <h3><i class="fa-solid fa-file-lines"></i>&nbsp; &nbsp;Itens mais utilizados</h3>
              <?php
                if ($movimentacoes) :
                  // var_dump($movimentacoes);
                  echo '<ol style="margin: 10px 0 0 15px; font-size:17px; color: var(--search-text);">';
                    foreach ($movimentacoes as $produto) :
                        echo '<li style="margin: 2px 0 0 0;">' . $produto['Descricao'] . ' - ' . abs($produto['quantidade']) . ' unidades ' . '</li>';
                        // var_dump($produto);
                    endforeach;
                  echo '</ol>';
                endif;
              ?>
            </div>
          </div>
        </div>
      </main>
    </body>
    <script src="<?php echo BASEURL; ?>js/index.js"></script>
    <script src="<?php echo BASEURL; ?>js/script.js"></script>
    <!-- <script src="<?php echo BASEURL; ?>js/whiteMode.js"></script> -->
</html>