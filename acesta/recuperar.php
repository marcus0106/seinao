<?php 
require_once("conexao.php");
$email = $_POST['email'];

$query = $pdo->query("SELECT * FROM config where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg == 0){
	echo 'Email não Cadastrado!!';
	exit();
}else{
	$senha = $res[0]['senha'];

$remetente = $email;
$assunto = 'Recuperação de Senha - ' .$nome_sistema;

$mensagem = 'Sua senha é: '.$senha;
$dest = $email;
$cabecalhos = "From: " .$dest;

@mail($remetente, $assunto, $mensagem, $cabecalhos);
echo 'Recuperado com Sucesso';
}

 ?>