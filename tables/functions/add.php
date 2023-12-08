<?php 
// session_start();
// include_once("../conexao.php");

// $id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
// $quantidade_a_somar = filter_input(INPUT_POST, 'quantidade_a_somar', FILTER_SANITIZE_NUMBER_INT);

// // Consulta SQL para subtrair a quantidade_a_subtrair da coluna quantidade
// $result_produto = "UPDATE produto SET quantidade = quantidade + $quantidade_a_somar WHERE id_produto='$id_produto'";
// $resultado_produto = mysqli_query($conn, $result_produto);

// if(mysqli_affected_rows($conn)){
// 	$_SESSION['msg'] = "";
// 	header("Location: ../okConfirma.php");
// } else {
//     $_SESSION['msg'] = "<p style='color:red;'>Produto não foi editado com sucesso</p> <a href='editEpi.php?id=$id_produto'>Retornar para tentar novamente</a>";
//     // var_dump($result_produto);
// }

session_start();
include_once("../conexao.php");

$id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
$quantidade_a_somar = filter_input(INPUT_POST, 'quantidade_a_somar', FILTER_SANITIZE_NUMBER_INT);
$funcionario = filter_input(INPUT_POST, 'funcionario', FILTER_SANITIZE_NUMBER_INT);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);


// Inicia a transação
mysqli_begin_transaction($conn);

try {
    // Consulta SQL para subtrair a quantidade_a_subtrair da coluna quantidade
    $result_produto = "UPDATE produto SET quantidade = quantidade + $quantidade_a_somar WHERE id_produto='$id_produto'";
    $resultado_produto = mysqli_query($conn, $result_produto);

    if (!mysqli_affected_rows($conn)) {
        throw new Exception("Erro ao atualizar a tabela de produtos.");
    }

    $result_movimentacao = "INSERT INTO movimentacao (Data, QntdModificada, Produto_id, Usuario_id, Funcionario_id) 
    VALUES (NOW(), $quantidade_a_somar, $id_produto, $id_usuario, ". ($funcionario ? $funcionario : "NULL") .")";
    $resultado_movimentacao = mysqli_query($conn, $result_movimentacao);

    if (!mysqli_affected_rows($conn)) {
        throw new Exception("Erro ao inserir na tabela de movimentações.");
    }

    // Comita a transação
    mysqli_commit($conn);

    // $_SESSION['msg'] = "";
    header("Location: ../okConfirma.php");
} catch (Exception $e) {
    // Em caso de erro, reverte a transação
    mysqli_rollback($conn);

    $_SESSION['msg'] = "<p style='color:red;'>Erro: " . $e->getMessage() . "</p> <a href='editEpi.php?id=$id_produto'>Retornar para tentar novamente</a>";
    // var_dump($result_produto);
}