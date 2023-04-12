<?php 
@session_start();
@session_destroy();

echo '<script>window.location="../index.php"</script>';
//require_once('../conexao.php');
	//inserir log
	//$tabela = 'beneficiario';
	//$acao = 'logout';
	//$descricao = 'logout';
	//require_once("inserir-logs.php");


 ?>