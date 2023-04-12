<?php
require_once("../../conexao.php");

$tabela = 'beneficiarios';

$nome = $_POST['nome'];
$nome_infor = $_POST['nome_infor'];
$nomesocial = $_POST['nomesocial'];
$sexo = $_POST['sexo'];
$racacor = $_POST['racacor'];
$etnia = $_POST['etnia'];
$tipodoc = $_POST['tipodoc'];
$docnum = $_POST['docnum'];
$docorgao = $_POST['docorgao'];
$docexpedicao = $_POST['docexpedicao'];
$natura = $_POST['natura'];
$nacional = $_POST['nacional'];
$religiao = $_POST['religiao'];
$escolaridade = $_POST['escolaridade'];
$ensino = $_POST['ensino'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$datanasc = $_POST['datanasc'];
$reservista = $_POST['reservista'];
$clt = $_POST['clt'];
$cartaosus = $_POST['cartaosus'];
$cartaovacina = $_POST['cartaovacina'];
$id = $_POST['id'];

//echo "string" .$natura;
//exit();
$nome_infor = strtoupper($nome_infor);


$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$foto = $res[0]['foto'];
	$fotorg = $res[0]['fotorg'];
}else{
	$foto = '../images/perfil/sem-perfil.jpg';
	$fotorg = './images/arquivos/sem-foto.png';
}


//SCRIPT PARA SUBIR FOTO-RG-CPF NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['fotorg']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);
$caminho = '../images/arquivos/' .$nome_img;

$imagem_temp = @$_FILES['fotorg']['tmp_name']; 

if(@$_FILES['fotorg']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'pdf'){ 

		if (@$_FILES['fotorg']['name'] != ""){

			//EXCLUO A FOTO ANTERIOR
			if($fotorg != "sem-foto.jpg"){
				@unlink('../images/arquivo/'.$fotorg);
			}

			$fotorg = $nome_img;
		}

		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
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
	$query = $pdo->prepare("INSERT INTO $tabela SET nome_infor = :nome_infor, nome = :nome, nomesocial = :nomesocial, sexo = '$sexo', racacor = '$racacor', etnia = '$etnia', tipodoc = '$tipodoc', docnum = :docnum, docorgao = '$docorgao', docexpedicao = '$docexpedicao', natura = '$natura', nacional = '$nacional', religiao = '$religiao', escolaridade = '$escolaridade', ensino = '$ensino', pai = :pai, mae = :mae, datanasc = '$datanasc', reservista = :reservista, clt = :clt, cartaovacina = :cartaovacina, cartaosus = :cartaosus, data_cad = curDate(), hora_cad = curTime(), ativo = 'Sim'");
	$acao = 'inserção';
	
}else{
	$query = $pdo->prepare("UPDATE $tabela SET 
		nome = :nome,
		nome_infor = :nome_infor, 
		nomesocial = :nomesocial, 
		sexo = '$sexo', 
		racacor = '$racacor', 
		etnia = '$etnia', 
		tipodoc = '$tipodoc', 
		docnum = :docnum, 
		docorgao = '$docorgao', 
		docexpedicao = '$docexpedicao',
		natura = '$natura',
		nacional = '$nacional',
		ensino = '$ensino', 
		religiao = '$religiao',
		escolaridade = '$escolaridade',
		pai = :pai, 
		mae = :mae, 
		datanasc = '$datanasc', 
		reservista = :reservista, 
		clt = :clt, 
		cartaosus = :cartaosus, 
		cartaovacina = :cartaovacina, 
		data_cad = curDate(), 
		hora_cad = curTime(), 
		foto = '$foto',
		fotorg = '$fotorg',
		ativo = 'Sim' where id = '$id'"); 
		$acao = 'edição';
	
	
}

	$query->bindValue(":nome", "$nome");
	$query->bindValue(":nome_infor", "$nome_infor");
	$query->bindValue(":nomesocial", "$nomesocial");
	$query->bindValue(":docnum", "$docnum");
	$query->bindValue(":pai", "$pai");
	$query->bindValue(":mae", "$mae");
	$query->bindValue(":reservista", "$reservista");
	$query->bindValue(":clt", "$clt");
	$query->bindValue(":cartaosus", "$cartaosus");
	$query->bindValue(":cartaovacina", "$cartaovacina");

	$query->execute();
	$ult_id = $pdo->lastInsertId();


if(@$ult_id == "" || @$ult_id == 0){
	$ult_id = $id;
}


echo 'Salvo com Sucesso';

 ?>
