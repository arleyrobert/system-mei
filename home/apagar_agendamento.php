<?php
session_start();
include("conexao.php");
$id_user = $_SESSION['usuarioId'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM entradas WHERE id_entradas =$id";
   
	$resultado_usuario = mysqli_query($conn, $result_usuario);
    
    $query = "DELETE FROM saidas WHERE id_saidas =$id";
    $saidas = mysqli_query($conn, $query);
    
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Agendamento apagado com sucesso</p>";
		header("Location: agendamentos.php?id=$id_user");
	}else{
		
		$_SESSION['msg'] = "<p style='color:green;'>Agendamento apagado com sucesso</p>";
		header("Location: agendamentos.php?id=$id_user");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um agendamento</p>";
	header("Location: agendamentos.php?id=$id_user");
}
?>