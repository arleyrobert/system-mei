<?php
session_start();
$id = $_SESSION['usuarioId'];
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$id = $_POST['id_usuario'];

//echo "Nome: $nome <br>";


$result_produto = "INSERT INTO produtos (nome, valor, descricao, id_usuario) VALUES ('$nome', '$valor','$descricao','$id')";
$resultado_produto = mysqli_query($conn, $result_produto);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto/Serviço cadastrado com sucesso</p>";
	header("Location: novo_produto.php?id=".$id."");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto/Serviço não foi cadastrado com sucesso</p>";
	header("Location: novo_produto.php?=".$id."");
}
