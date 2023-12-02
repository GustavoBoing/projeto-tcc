<?php 

require_once ('../config.php');
require_once(DBAPI);

$movimentacoes = null;
$movimentacao = null;

$historicos = null;
$historico = null;

$produtos = null;
$produto = null;

$pouco = null;
$poucos = null;

function maisUtilizados(){
    global $movimentacoes;
    $movimentacoes = innerJoin2("id_mov, id_produto, COUNT(Produto_id) AS total_saidas, SUM(CASE WHEN QntdModificada < 0 THEN QntdModificada ELSE 0 END) AS quantidade, 
    Descricao, Funcionario_id, QntdModificada, Data, Produto_id", "movimentacao", "produto", 
    "movimentacao.Produto_id", "produto.id_produto", "0", "DESC");
}

    function movimentacao() {
        global $produtos;
        $produtos = find_all('movimentacao');
    }

    function historico() {
        global $historicos;

        $historicos = innerJoin("id_mov, id_produto, Descricao, Funcionario_id, QntdModificada, Data, Produto_id, QntdAtual ", 
        "movimentacao", "produto", "movimentacao.Produto_id", "produto.id_produto");
    }
    function grandeQtd() {
        global $produtos;
        $produtos = quantities("produto", "DESC");
        // ob_start();
        // var_dump($produtos);

        // // Captura a saída do var_dump
        // $output = ob_get_clean();

        // // Envia a saída para o console do navegador
        // echo '<script>console.log(' . json_encode($output) . ')</script>';
    } 

    function poucaQtd() {
        global $poucos;
        $poucos = quantities("produto", "ASC");
    }

    function innerJoin ($data = null, $table = null, $tableInner = null, $table01Column = null, $p = null) {

        $database = open_database();
        $found = null;
    
        try{
            if($p) {
              $sql = "SELECT " . $data . " FROM " . $table . " INNER JOIN " . $tableInner . " ON " . $table01Column . "=" . $p;
              $result = $database->query($sql);
              if($result->num_rows > 0)  {
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

    function innerJoin2 ($data = null, $table = null, $tableInner = null, $table01Column = null,$dataInner = null, $sai = null, $p = null) {

        $database = open_database();
        $found = null;
    
        try{
            if($p) {
              $sql = "SELECT " . $data . " FROM " . $table . " INNER JOIN " . $tableInner . " ON " . $table01Column . "=" . $dataInner . " WHERE QntdModificada < " . $sai . " GROUP BY Descricao ORDER BY quantidade " . $p . " LIMIT 5";
              $result = $database->query($sql);
              if($result->num_rows > 0)  {
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

    //$table = tabela do banco, $p = informa se é decrescente ou crescente
    function quantities ($table = null, $p = null) {

        $database = open_database();
        $found = null;
    
        try{
            if($p) {
                $sql = "SELECT * FROM " . $table . " ORDER BY Quantidade " . $p . " LIMIT 5";
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

    function select ($data = null, $table = null, $p = null) {

        $database = open_database();
        $found = null;
    
        try{
            if($p) {
              $sql = "SELECT " . $data . " FROM " . $table . $p;
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

    function add(){
        if (!empty($_POST['usuario'])) {
            $usuario = $_POST['usuario'];
            
            save('usuario', $usuario);
            header('location: ../tables/okConfirma.php');
          }
    }