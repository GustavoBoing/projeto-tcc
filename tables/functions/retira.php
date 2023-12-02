<?php

session_start();
include_once("../conexao.php");

$id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
$quantidade_a_subtrair = filter_input(INPUT_POST, 'quantidade_a_subtrair', FILTER_SANITIZE_NUMBER_INT);

// Consulta SQL para subtrair a quantidade_a_subtrair da coluna quantidade
$result_produto = "UPDATE produto SET quantidade = quantidade - $quantidade_a_subtrair WHERE id_produto='$id_produto'";
$resultado_produto = mysqli_query($conn, $result_produto);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
    header("Location: ./okConfirma.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Produto não foi editado com sucesso</p> <a href='editEpi.php?id=$id_produto'>Retornar para tentar novamente</a>>";
    var_dump($result_produto);
}