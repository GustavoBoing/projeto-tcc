<?php 

require_once ('../config.php');
require_once(DBAPI);

$produtos = null;
$produto = null;

    function indexEPI() {
        global $produtos;

        // Crie uma conexão com o banco de dados (substitua as informações de conexão corretas)
        $pdo = new PDO("mysql:host=localhost;dbname=almoxarifado", "root", "");
    
        if (!empty($_POST['Produto_id'])){
            // Execute a consulta SQL com uma condição
            $stmt = $pdo->prepare('SELECT * FROM movimentacao');
        } else {
            // Execute a consulta SQL sem condição
            $stmt = $pdo->prepare('SELECT * FROM movimentacao');
        }
    
        // Execute a consulta preparada
        $stmt->execute();
    
        // Recupere os resultados em um array associativo
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // global $produtos;
        // if(!empty($_POST['Descricao']) && $_POST['name'] == 'EPI')){
        //     $produtos = 'SELECT * FROM produto WHERE tipo = 1';
        // } else {
        //     $produtos = 'SELECT * FROM produto';
        // }
    }