<?php 
require_once("../../conexao.php");

$tabela = 'beneficiarios';

$estadocivil = $_POST['estadocivil'];
$nomeconjugue = $_POST['nomeconjugue'];
$cpfconjugue = $_POST['cpfconjugue'];
$datanascconjugue = $_POST['datanascconjugue'];
$sexoconjugue = $_POST['sexoconjugue'];
$telefoneconjugue = $_POST['telefoneconjugue'];
$racacorconjugue = $_POST['racacorconjugue'];
$etniaconjugue = $_POST['etniaconjugue'];
$naturalconjugue = $_POST['naturalconjugue'];
$nacionalconjugue = $_POST['nacionalconjugue'];
$escolaridadeconjugue = $_POST['escolaridadeconjugue'];
$ensinoconjugue = $_POST['ensinoconjugue'];
$emailconjugue = $_POST['emailconjugue'];
$redesocialconjugue = $_POST['redesocialconjugue'];
$descricaoredesocialconjugue = $_POST['descricaoredesocialconjugue'];
$paiconjugue = $_POST['paiconjugue'];
$maeconjugue = $_POST['maeconjugue'];
$id = $_POST['id'];

//echo "string" .$natura;
//exit();



$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$foto = $res[0]['foto'];
}else{
	$foto = './images/perfil/sem-perfil.jpg';
}


//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);
$caminho = '../images/perfil/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg'){ 

		if (@$_FILES['foto']['name'] != ""){

			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-perfil.jpg"){
				@unlink('../images/perfil/'.$foto);
			}

			$foto = $nome_img;
		}

		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}
if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET estadocivil = '$estadocivil', nomeconjugue = :nomeconjugue, cpfconjugue = :cpfconjugue, datanascconjugue = '$datanascconjugue', sexoconjugue = '$sexoconjugue', telefoneconjugue = :telefoneconjugue, racacorconjugue = '$racacorconjugue', etniaconjugue = '$etniaconjugue', naturalconjugue = '$naturalconjugue', nacionalconjugue = '$nacionalconjugue', escolaridadeconjugue = '$escolaridadeconjugue', ensinoconjugue = '$ensinoconjugue', emailconjugue = :emailconjugue, redesocialconjugue = '$redesocialconjugue', descricaoredesocialconjugue = :descricaoredesocialconjugue, paiconjugue = :paiconjugue, maeconjugue = :maeconjugue, data_cad = curDate(), hora_cad = curTime(), ativo = 'Sim'");
	$acao = 'inserção';
	
}else{
	$query = $pdo->prepare("UPDATE $tabela SET 
		estadocivil = '$estadocivil',
		nomeconjugue = :nomeconjugue,
		cpfconjugue = :cpfconjugue, 
		datanascconjugue = '$datanascconjugue', 
		sexoconjugue = '$sexoconjugue', 
		telefoneconjugue = :telefoneconjugue, 
		racacorconjugue = '$racacorconjugue', 
		etniaconjugue = '$etniaconjugue', 
		naturalconjugue = '$naturalconjugue', 
		nacionalconjugue = '$nacionalconjugue', 
		escolaridadeconjugue = '$escolaridadeconjugue',
		ensinoconjugue = '$ensinoconjugue',
		emailconjugue = :emailconjugue,
		redesocialconjugue = '$redesocialconjugue', 
		descricaoredesocialconjugue = :descricaoredesocialconjugue, 
		paiconjugue = :paiconjugue, 
		maeconjugue = :maeconjugue, 
		data_cad = curDate(), 
		hora_cad = curTime(), 
		ativo = 'Sim' where id = '$id'"); 
		$acao = 'edição';
	
	
}

	$query->bindValue(":nomeconjugue", "$nomeconjugue");
	$query->bindValue(":cpfconjugue", "$cpfconjugue");
	$query->bindValue(":emailconjugue", "$emailconjugue");
	$query->bindValue(":paiconjugue", "$paiconjugue");
	$query->bindValue(":maeconjugue", "$maeconjugue");
	$query->bindValue(":descricaoredesocialconjugue", "$descricaoredesocialconjugue");
	$query->bindValue(":telefoneconjugue", "$telefoneconjugue");

	$query->execute();
	$ult_id = $pdo->lastInsertId();


if(@$ult_id == "" || @$ult_id == 0){
	$ult_id = $id;
}


echo 'Salvo com Sucesso';

 ?>
