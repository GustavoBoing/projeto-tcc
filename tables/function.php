<?php 

require_once ('../config.php');
require_once(DBAPI);

$produtos = null;
$produto = null;

    function index() {
        global $produtos;

        // Crie uma conexão com o banco de dados (substitua as informações de conexão corretas)
        $pdo = new PDO("mysql:host=localhost;dbname=almoxarifado", "root", "");
    
        if (!empty($_POST['Descricao'])) {
            // Execute a consulta SQL com uma condição
            $stmt = $pdo->prepare('SELECT * FROM produto WHERE tipo = 1');
        } else {
            // Execute a consulta SQL sem condição
            $stmt = $pdo->prepare('SELECT * FROM produto');
        }
    
        // Execute a consulta preparada
        $stmt->execute();
    
        // Recupere os resultados em um array associativo
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // global $produtos;
        // if(!empty($_POST['Descricao'])){
        //     $produtos = 'SELECT * FROM produto WHERE tipo = 1';
        // } else {
        //     $produtos = 'SELECT * FROM produto';
        // }

        /*function index() {
            global $customers;
            if(!empty ($_POST['name'])){
            $customers = filter("customers", "name LIKE '%" . $_POST['name'] . "%'");
            } else {
            $customers = find_all('customers');
            }
            global $customers;
            $customers = find_all('customers');
        }*/
    }

?>