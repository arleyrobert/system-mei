<?php
session_start();
include("conexao.php");
$id_user = $_SESSION['usuarioId'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM produtos where id=$id";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto/Serviço apagado com sucesso</p>";
		header("Location: produtos.php?id=$id_user");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro! O Produto/Serviço não foi apagado com sucesso</p>";
		header("Location: produtos.php?id=$id_user");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um produto ou serviço</p>";
	header("Location: produtos.php?id=$id_user");
}
?>
