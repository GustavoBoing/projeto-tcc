<?php 

require_once ('../config.php');
require_once(DBAPI);

$produtos = null;
$produto = null;

$gerarRelatorioEpis = null;

$gerarRelatorioIns = null;

    function indexEPI() {
        global $produtos;
        if (!empty($_POST['filtro'])){
            $produtos = filter("produto", "Descricao LIKE '%" . $_POST['filtro'] . "%' AND Tipo = 1");
        } else {
            $produtos = find_all('produto');
        }
    }

    function indexINS() {
        global $produtos;
        if (!empty($_POST['filtro'])){
            $produtos = filter("produto", "Descricao LIKE '%" . $_POST['filtro'] . "%' AND Tipo = 2");
        } else {
            $produtos = find_all('produto');
        }
    }

    function filtragem () {
        global $filtro;
        if(!empty($_POST['filtro'])) {
            $filtro = filter("produto", "Descricao LIKE '%" . $_POST['filtro'] . "%' AND Tipo = 1");
        } else {
            $filtro = find_all('produto');
        }
    }

    function filter ($table = null, $p = null) {

        $database = open_database();
        $found = null;
    
        try{
            if($p) {
              $sql = "SELECT * FROM " . $table . " WHERE " . $p;
              $result = $database->query($sql);
              if($result->num_rows > 0) {
                  $found = array();
                  while ($row = $result->fetch_assoc()) {
                    array_push($found, $row);
                  }
              } else{
                  throw new Exception("Não foram encontrados registros de dados!");
              }
            }
        } catch (Exception $e)  {
            $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
        close_database($database);
        return $found;
    }

    function geraPdfEpi(){
        global $gerarRelatorioEpi;
        $gerarRelatorioEpi = pdf("produto", "Tipo = 1");
    }

    function geraPdfIns(){
        global $gerarRelatorioIns;
        $gerarRelatorioIns = pdf("produto", "Tipo = 2");
    }
    
    function pdf ($table = null, $p = null) {

        $database = open_database();
        $found = null;
    
        try{
            if($p) {
              $sql = "SELECT * FROM " . $table . " WHERE " . $p;
              $result = $database->query($sql);
              if($result->num_rows > 0) {
                  $found = array();
                  while ($row = $result->fetch_assoc()) {
                    array_push($found, $row);
                  }
              } else{
                  throw new Exception("Não foram encontrados registros de dados!");
              }
            }
        } catch (Exception $e)  {
            $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
        close_database($database);
        return $found;
    }

    function add(){
        if (!empty($_POST['produto'])) {
            $produto = $_POST['produto'];
            
            if (isset($produto['Valor'])) {
                // Remover o símbolo "R$"
                $produto['Valor'] = str_replace("R$", "", $produto['Valor']);
                // Substituir vírgulas por pontos
                $produto['Valor'] = str_replace(",", ".", $produto['Valor']);
            }
            
            save('produto', $produto);
            header('location: ./okConfirma.php');
          }
    }

?>