<?php
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* define o prazo do cache em 120 minutos */
session_cache_expire(120);
$cache_expire = session_cache_expire();
/* inicia a sessão */

@session_start(); 
require_once("conexao.php");

$cpf = $_POST['cpf'];

$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);


$query = $pdo->query("SELECT * FROM beneficiarios where cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0){
	$_SESSION['id_beneficiario'] = $res[0]['id'];
	$_SESSION['nome_beneficiario'] = $res[0]['nome'];
	$_SESSION['cpf_beneficiario'] = $res[0]['cpf'];

	//inserir log
	$tabela = 'beneficiarios';
	$acao = 'login';
	$descricao = 'login do beneficiario';
	require_once("painel/inserir-logs.php");

	echo "<script>window.location='painel'</script>";
}else{
	echo "<script>window.alert('Caso seja beneficiário, comparecer a SETRABES munido com todos os documentos pessoais.');</script>";
	echo "<script>window.location='index.php'</script>";
}	




/*
@session_start();
require_once("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

if($email == $email_sistema and $senha == $senha_sistema){
	$_SESSION['nome'] = $nome_sistema;
	echo '<script>window.location="painel"</script>';
}else{
	echo '<script>alert("Dados Incorretos")</script>';
	echo '<script>window.location="index.php"</script>';
}

*/
 ?>