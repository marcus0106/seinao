<?php 
require_once("../../conexao.php");
@session_start();
$idben = $_SESSION['id_beneficiario'];

$tabela = 'dependentes';

$id = $_POST['id'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$racacor = $_POST['racacor'];
$etnia = $_POST['etnia'];
$cpf = $_POST['cpf'];
$tipodoc = $_POST['tipodoc'];
$docnum = $_POST['docnum'];
$docorgao = $_POST['docorgao'];
$docexpedicao = $_POST['docexpedicao'];
$pcd = $_POST['pcd'];
$parentesco = $_POST['parentesco'];
$natura = $_POST['natura'];
$nacional = $_POST['nacional'];
$religiao = $_POST['religiao'];
$escolaridade = $_POST['escolaridade'];
$ensino = $_POST['ensino'];
$datanasc = $_POST['datanasc'];
$reservista = $_POST['reservista'];
$clt = $_POST['clt'];
$cartaosus = $_POST['cartaosus'];
$cartaovacina = $_POST['cartaovacina'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$redesocial = $_POST['redesocial'];
$descricaoredesocial = $_POST['descricaoredesocial'];


if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET idben = '$idben', nome = :nome, sexo = '$sexo', racacor = '$racacor', etnia = '$etnia', cpf = :cpf, tipodoc = '$tipodoc', docnum = :docnum, docorgao = '$docorgao', docexpedicao = :docexpedicao, pcd = '$pcd', parentesco = '$parentesco', natura = '$natura', nacional = '$nacional', religiao = '$religiao', escolaridade = '$escolaridade', ensino = '$ensino', datanasc = :datanasc, reservista = :reservista, clt = :clt, cartaosus = :cartaosus, cartaovacina = :cartaovacina, telefone = :telefone, email = :email, redesocial = '$redesocial', descricaoredesocial = :descricaoredesocial");
	
}else{
	$query = $pdo->prepare("UPDATE $tabela SET idben = '$idben', nome = :nome, sexo = '$sexo', racacor = '$racacor', etnia = '$etnia', cpf = :cpf, tipodoc = '$tipodoc', docnum = :docnum, docorgao = '$docorgao', docexpedicao = :docexpedicao, pcd = '$pcd', parentesco = '$parentesco', natura = '$natura', nacional = '$nacional', religiao = '$religiao', escolaridade = '$escolaridade', ensino = '$ensino', datanasc = :datanasc, reservista = :reservista, clt = :clt, cartaosus = :cartaosus, cartaovacina = :cartaovacina, telefone = :telefone, email = :email, redesocial = '$redesocial', descricaoredesocial = :descricaoredesocial WHERE id = '$id'");



}

$query->bindValue(":nome", "$nome");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":docnum", "$docnum");
$query->bindValue(":docexpedicao", "$docexpedicao");
$query->bindValue(":datanasc", "$datanasc");
$query->bindValue(":reservista", "$reservista");
$query->bindValue(":clt", "$clt");
$query->bindValue(":cartaosus", "$cartaosus");
$query->bindValue(":cartaovacina", "$cartaovacina");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":email", "$email");
$query->bindValue(":descricaoredesocial", "$descricaoredesocial");

$query->execute();
$ult_id = $pdo->lastInsertId();

if($id == ""){
	$novo_id = $ult_id;
}else{
	$novo_id = $id;
}

//atualizar no imovel o campo url
//$query = $pdo->query("UPDATE $tabela SET url = '$url' WHERE id = '$novo_id'");

echo 'Salvo com Sucesso'; 

?>