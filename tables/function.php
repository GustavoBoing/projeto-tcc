<?php 

require_once ('../config.php');
require_once(DBAPI);

$produtos = null;
$produto = null;

    function indexEPI() {
        global $produtos;

        // Crie uma conexão com o banco de dados (substitua as informações de conexão corretas)
        $pdo = new PDO("mysql:host=localhost;dbname=almoxarifado", "root", "");
    
        if (!empty($_POST['Descricao']) && $_POST['Tipo'] == 1){
            // Execute a consulta SQL com uma condição
            $stmt = $pdo->prepare('SELECT * FROM produto WHERE Tipo = 1');
        } else {
            // Execute a consulta SQL sem condição
            $stmt = $pdo->prepare('SELECT * FROM produto');
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

    function indexINS() {
        global $produtos;

        // Crie uma conexão com o banco de dados (substitua as informações de conexão corretas)
        $pdo = new PDO("mysql:host=localhost;dbname=almoxarifado", "root", "");
    
        if (!empty($_POST['Descricao']) && $_POST['Tipo'] == 2){
            // Execute a consulta SQL com uma condição
            $stmt = $pdo->prepare('SELECT * FROM produto WHERE Tipo = 2');
        } else {
            // Execute a consulta SQL sem condição
            $stmt = $pdo->prepare('SELECT * FROM produto');
        }
    
        // Execute a consulta preparada
        $stmt->execute();
    
        // Recupere os resultados em um array associativo
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>