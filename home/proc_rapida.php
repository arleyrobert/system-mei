<?php
session_start();
$id = $_SESSION['usuarioId'];
include_once("conexao.php");

//$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
//$valor = $_POST['valor'];
//$descricao = $_POST['descricao'];
//$produto = $_POST['id_produto'];


$valores = explode('|',$_POST['id_produto']);
$produto = $valores[0];

$nome = $valores[1];

$valor = $valores[2];

$descricao = $valores[3];



$id = $_POST['id_usuario'];

//echo "Nome: $nome <br>";


$result_produto = "INSERT INTO entradas (nome, valor, descricao, data, quantidade, id_usuario, id_produto) VALUES ('$nome', '$valor', '$descricao', NOW(), '$quantidade' ,'$id','$produto')";
$resultado_produto = mysqli_query($conn, $result_produto);

//$result_produto = "INSERT INTO entradas (nome, valor, descricao, data, quantidade, id_usuario, id_produto) SELECT (produtos.nome,produtos.valor,produtos.descricao) WHERE produtos.id=entradas.id_produto";
//$resultado_produto = mysqli_query($conn, $result_produto);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Entrada rápida cadastrada com sucesso</p>";
	header("Location: fluxo.php?id=".$id."");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Não foi cadastrado com sucesso</p>".mysqli_error($conn);
	header("Location: fluxo.php?=".$id."");
}
?>
