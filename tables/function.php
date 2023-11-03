<?php 

require_once ('../config.php');
require_once(DBAPI);

$produtos = null;
$produto = null;

    function indexEPI() {
        global $produtos;
        if (!empty($_POST['Descricao'])){
            $produtos = filter("produto", "Descricao LIKE '%" . $_POST['Descricao'] . "%'");
        } else {
            $produtos = find_all('produto');
        }
    }

    function indexINS() {
        global $produtos;
        if (!empty($_POST['Descricao'])){
            $produtos = filter("produto", "Tipo LIKE '%" . $_POST['Tipo'] . "%'");
        } else {
            $produtos = find_all('produto');
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

?>