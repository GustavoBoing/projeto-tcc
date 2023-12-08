<?php 
  require_once('function.php');

    if (isset($_GET['id'])){
        deleteFornecedor($_GET['id']);
    } else {
        die("ERRO: ID não definido.");
    }
?>