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
                <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <script src="<?php echo BASEURL; ?>js/script.js" defer ></script>

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
        <div id="boxes" class="boxes">
          <div id="caixa01" class="box">
            <h3>Grande quantidade</h3>
            <p></p>
          </div>
          <div id="caixa02" class="box">
            <h3>Baixa quantidade</h3>
          </div>
        </div>
        <!-- <div id="boxes" class="boxes">
          <div id="caixa01" class="box">
              <h3>Pouca quantidade</h3>
              <p></p>
          </div>

          <div id="caixa02" class="box">
              <h3>Grande quantidade</h3>
              <p></p>
          </div>
        </div> -->
      </main>
      <div class="graphic">
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
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
      </body>
    </div>
</html>