<?php
session_start();
include_once("../conexao.php");

$id_funcionario = filter_input(INPUT_POST, 'id_funcionario', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'Nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'Telefone', FILTER_SANITIZE_NUMBER_INT);
$CPF = filter_input(INPUT_POST, 'CPF', FILTER_SANITIZE_NUMBER_INT);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

if(isset($CPF)) {

	// $cpfSemFormato = str_replace(['.', '-'], '', $cpfFormatado);
	$CPF = str_replace(['.', '-'], "", $CPF);
  }

  if(isset($telefone)) {

	// $cpfSemFormato = str_replace(['.', '-'], '', $cpfFormatado);
	$telefone = str_replace(['(', ')', '-', ' '], "", $telefone);
  }

$result_produto = "UPDATE funcionario SET Nome='$nome', TelContato='$telefone', CPF='$CPF' WHERE id_funcionario='$id_funcionario'";
$resultado_produto = mysqli_query($conn, $result_produto);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "";
	header("Location: ../../tables/okConfirma.php");
}else{
	$_SESSION['msg'] = "";
	header("Location: ../../tables/erradoIndex.php");
	// var_dump($result_produto);
}

                                    