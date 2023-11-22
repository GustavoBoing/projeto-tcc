<?php 
    require_once "../../config.php";
    require_once('../function.php');
    require '../../vendor/autoload.php';
    geraPdfEpi();

    $d = new DateTime("now");
    $d->format('Y');

    //informações para o PDF
    $dados = "<!DOCTYPE html>" ;
    $dados .= "<html lang='en'>";
    $dados .= "<head>";
    $dados .= "<meta charset='UTF-8'>";
    $dados .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Relatório dos Epi's</title>";
    $dados .= "<link rel='stylesheet' href='http://localhost/projeto-tcc/css/stylePDF.css'/>";
    $dados .= "</head>";
    $dados .= "<body>";
    $dados .= "<p class='titulo'>Produtos com Baixa Quantidade</p>";

    // var_dump($gerarRelatorioEpi);
    if ($gerarRelatorioEpi) {
        foreach ($gerarRelatorioEpi as $produto) {
            if ($produto["Tipo"] == "1") {
                // var_dump($produto);
                $dados .= "<div class='content'>";
                $dados .= "<p class='produto'>Produto: {$produto['Descricao']} </p>";
                $dados .= "<p class='produto'>Quantidade: {$produto['Quantidade']} </p>";
                $dados .= '<hr>';
                $dados .= "</div>";
            }
        }
    }

    use Dompdf\Dompdf;
    
    $dataAtual = date('d/m/Y');

    //instanciar e usar a classe dompdf
    $dompdf = new Dompdf(['enable_remote' => true]);

    $dados .= "<img src=''>";
    $dados .= "<div class='date'>";
    $dados .= "<div class='data'>";
    $dados .= "<p class=''>$dataAtual</p>";
    $dados .= "</div>";
    $dados .= "</div>";
    $dados .= "</body>";
    
    //Instanciar o método
    $dompdf->loadHtml($dados);

    // Configurar o tamanho e a orientação do papel
    //Landscape - Imprimir no formato retrato
    $dompdf->setPaper("A4", "portrait");

    //Renderiza o HTML como PDF
    $dompdf->render();

    //gerar PDF
    $dompdf->stream();
