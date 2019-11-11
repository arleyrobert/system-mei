<?php
session_start();
include("conexao.php");
$id_user = $_SESSION['usuarioId'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM saidas where id_saidas=$id";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Saída apagada com sucesso</p>";
		header("Location: entradas_saidas.php?id=$id_user");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro! A saída não foi apagada com sucesso</p>";
		header("Location: entradas_saidas.php?id=$id_user");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma saída</p>";
	header("Location: entradas_saidas.php?id=$id_user");
}
?>