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

        // global $customers;
        // if(!empty ($_POST['name'])){
        //   $customers = filter("customers", "name LIKE '%" . $_POST['name'] . "%'");
        // } else {
        //   $customers = find_all('customers');
        // }
        // /*global $customers;
        // $customers = find_all('customers');*/

        // Crie uma conexão com o banco de dados (substitua as informações de conexão corretas)
        // $pdo = new PDO("mysql:host=localhost;dbname=almoxarifado", "root", "");
    
        // if (!empty($_POST['Descricao']) && $_POST['Tipo'] == 1){
        //     // Execute a consulta SQL com uma condição
        //     $stmt = $pdo->prepare('SELECT * FROM produto WHERE Tipo = 1');
        // } else {
        //     // Execute a consulta SQL sem condição
        //     $stmt = $pdo->prepare('SELECT * FROM produto');
        // }
    
        // // Execute a consulta preparada
        // $stmt->execute();
    
        // // Recupere os resultados em um array associativo
        // $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // global $produtos;
        // if(!empty($_POST['Descricao']) && $_POST['name'] == 'EPI')){
        //     $produtos = 'SELECT * FROM produto WHERE tipo = 1';
        // } else {
        //     $produtos = 'SELECT * FROM produto';
        // }
    }

    function indexINS() {
        global $produtos;
        global $produtos;
        if (!empty($_POST['Descricao'])){
            $produtos = filter("produto", "Tipo LIKE '%" . $_POST['Tipo'] . "%'");
        } else {
            $produtos = find_all('produto');
        }
        // // Crie uma conexão com o banco de dados (substitua as informações de conexão corretas)
        // $pdo = new PDO("mysql:host=localhost;dbname=almoxarifado", "root", "");
    
        // if (!empty($_POST['Descricao']) && $_POST['Tipo'] == 2){
        //     // Execute a consulta SQL com uma condição
        //     $stmt = $pdo->prepare('SELECT * FROM produto WHERE Tipo = 2');
        // } else {
        //     // Execute a consulta SQL sem condição
        //     $stmt = $pdo->prepare('SELECT * FROM produto');
        // }
    
        // // Execute a consulta preparada
        // $stmt->execute();
    
        // // Recupere os resultados em um array associativo
        // $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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