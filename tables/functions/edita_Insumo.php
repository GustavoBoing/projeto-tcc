<?php
	session_start();
	include_once("../conexao.php");

	$id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
	$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);

	//echo "Nome: $nome <br>";
	//echo "E-mail: $email <br>";

	if (isset($valor)) {
		// Remover o símbolo "R$"
		$valor = str_replace("R$", "", $valor);
		// Substituir vírgulas por pontos
		$valor = str_replace(",", ".", $valor);
	}

	$result_produto = "UPDATE produto SET descricao='$descricao', valor='$valor', modelo='$modelo' WHERE id_produto='$id_produto'";
	$resultado_produto = mysqli_query($conn, $result_produto);

	if(mysqli_affected_rows($conn)){
		// $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p><br>";
		header("Location: ../okConfirma.php");
	}else{
		$_SESSION['msg'] = "";
		header("Location: ../erradoEpi.php");
		var_dump($result_produto);
	}