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
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>

    </body>
</html>