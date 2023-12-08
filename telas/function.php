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

$funcionario = null;
$usuario = null;


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

        $historicos = innerJoinLeftJoin("id_mov, id_produto, Descricao, Funcionario_id, QntdModificada, Data, Produto_id, Nome, id_usuario, Usuario_id, Login ", 
        "movimentacao", "produto", "movimentacao.Produto_id", "produto.id_produto", "funcionario",
        "movimentacao.Funcionario_id", "funcionario.id_funcionario", "usuario", "movimentacao.Usuario_id", "usuario.id_usuario ORDER BY Data DESC");

        // SELECT id_mov, id_produto, Descricao, Funcionario_id, QntdModificada, Data, Produto_id, Nome
        // FROM movimentacao
        // INNER JOIN produto ON movimentacao.Produto_id = produto.id_produto
        // LEFT JOIN funcionario ON movimentacao.Funcionario_id = funcionario.id_funcionario
        // ORDER BY Data DESC;
        // $historicos .= innerJoin("id_mov, id_produto, Nome, Funcionario_id, QntdModificada, Data, Produto_id ", 
        // "movimentacao", "funcionario", "movimentacao.Funcionario_id", "produto.id_funcionario");
    }
    function grandeQtd() {
        global $produtos;
        $produtos = quantities("produto WHERE Quantidade > 40", "DESC");
    } 

    function poucaQtd() {
        global $poucos;
        
        $condition = "produto Quantidade < 5 AND Data >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
        $poucos = quantities("produto WHERE Quantidade < 10", "ASC");
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


    function innerJoinLeftJoin ($data = null, $table = null, $tableInner = null, $table01Column = null, $o = null, 
    $tableLeft = null, $table02Column = null, $q = null, $tableRight = null, $table03Column = null, $p = null) {

        $database = open_database();
        $found = null;

        try{
            if($p) {
              $sql = "SELECT " . $data . " FROM " . $table . " INNER JOIN " . $tableInner . " ON " . $table01Column . "=" . $o . 
              " LEFT JOIN " . $tableLeft . " ON " . $table02Column . "=" . $q .
              " INNER JOIN " . $tableRight . " ON " . $table03Column . "=" . $p;
;
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
              $sql = "SELECT " . $data . " FROM " . $table . " INNER JOIN " . $tableInner . " ON " . $table01Column . "=" . $dataInner . " WHERE QntdModificada < " . $sai . " AND Data >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) GROUP BY Descricao ORDER BY quantidade " . $p . " LIMIT 5";
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

    function addFuncionario(){
        if (!empty($_POST['funcionario'])) {
            $funcionario = $_POST['funcionario'];
            
            save('funcionario', $funcionario);
            header('location: ../tables/okConfirma.php');
        }
    }
    function addFornecedor(){
        if (!empty($_POST['fornecedor'])) {
            $fornecedor = $_POST['fornecedor'];
            
            save('fornecedor', $fornecedor);
            header('location: ../tables/okConfirma.php');
        }
    }

    // function add(){
    //     if (!empty($_POST['produto'])) {
    //         $produto = $_POST['produto'];
            
    //         save('produto', $produto);
    //         header('location: ../telas/index.php');
    //       }
    // }