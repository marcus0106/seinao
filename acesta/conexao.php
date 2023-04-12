<?php 
/*
$usuario = 'geneso40_portfolio';
$senha = 'spagner@12401';
$banco = 'geneso40_portfolio';
$servidor = 'localhost';
*/
$usuario = 'root';
$senha = '';
$banco = 'acesta';
$servidor = 'localhost';

date_default_timezone_set('America/Boa_Vista');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao conectar com o Banco de Dados!';
	echo '<br>';
	echo $e;
}

//valores para as variaveis do sistema
$nome_sistema = 'Atualização Cadastral';
$nome_administrador = 'Utilidade Pública';
$email_administrador = 'discipulandorr@gmail.com';
$telefone_administrador = '(31)97527-5084';
$endereco_administrador = '';
$senha_administrador = 'gene1234';

/*
$query = $pdo->query("SELECT * FROM beneficiarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg == 0){
	$pdo->query("INSERT INTO beneficiarios SET nome = '$nome_administrador', email = '$email_administrador'");
}else{
$nome_sistema = $res[0]['nome'];
$email_sistema = $res[0]['email'];
}
*/

 ?>
