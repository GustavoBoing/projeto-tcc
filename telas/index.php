<?php
    require_once "../config.php";
    require_once('function.php');
    grandeQtd();
    poucaQtd();
    include(HEADER_TEMPLATE);
    session_start();
    if(!isset($_SESSION['login']))
      header("Location: ../index.php");
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
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <script src="<?php echo BASEURL; ?>js/script.js" defer ></script>

        <title>Almoxarifado</title>
    </head>
    <body>
      <div class="tittle" style="padding-left:16px">
        <h2 class="titulos" style="color:#F06E2D; text-shadow: 1px 2px 5px black;"><i class="fa-brands fa-uncharted fa-lg"></i> &nbsp; Página Inicial</h2>
        <p id="subtitulo">Visão geral do Almoxarifado</p>
      </div>
      <main>
        <div id="boxes" class="boxes">
          <div id="caixa01" class="box">
            <h3><i class="fa-regular fa-file-lines"></i>&nbsp; &nbsp;Grande quantidade</h3>
            <?php
              if ($produtos) :
                // var_dump($produtos);
                echo '<ol style="margin: 10px 0 0 15px; font-size:17px; color: white;">';
                foreach ($produtos as $produto) :
                  echo '<li style="margin: 2px 0 0 0;">' . $produto['Descricao'] . ' - ' . $produto['Quantidade'] . ' unidades ' . '</li>';
                endforeach;
                echo '</ol>';
              else :
                echo 'Nenhum produto está com quantidade maior que 35 unidades.';
              endif;
            ?>
          </div>
          <div id="caixa02" class="box">
            <h3><i class="fa-solid fa-file-lines"></i>&nbsp; &nbsp;Baixa quantidade</h3>
            <?php
              if ($poucos) :
                echo '<ol style="margin: 10px 0 0 15px; font-size:17px; color: white;">';
                foreach ($poucos as $produto) :
                  echo '<li style="margin: 2px 0 0 0;">' . $produto['Descricao'] . ' - ' . $produto['Quantidade'] . ' unidades ' . '</li>';
                endforeach;
                echo '</ol>';
              else :
                echo 'Nenhum produto está com quantidade menor que 10 unidades.';
              endif;
            ?>
          </div>
          <div id="caixa03" class="box">
            <h3><i class="fa-solid fa-file-lines"></i>&nbsp; &nbsp;Itens mais utilizados</h3>

          </div>
        </div>
      </main>
      <!-- <div class="graphic">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Year', 'Sales', 'Expenses'],
              ['2004',  1000,      400],
              ['2005',  1170,      460],
              ['2006',  660,       1120],
              ['2007',  1030,      540]
            ]);

            var options = {
              title: 'Company Performance',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
          }
        </script>
        <div id="curve_chart" style="width: 900px; height: 500px"></div> -->
      </body>
    </div>
</html>