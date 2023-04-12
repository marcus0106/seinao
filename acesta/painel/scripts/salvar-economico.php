<?php
require_once("../../conexao.php");

$tabela = 'beneficiarios';

$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$redesocial = $_POST['redesocial'];
$descricaoredesocial = $_POST['descricaoredesocial'];
$telefone = $_POST['telefone'];
$localizacao = $_POST['localizacao'];
$moradia = $_POST['moradia'];
$tipmorada = $_POST['tipmorada'];
$tipconstrucao = $_POST['tipconstrucao'];
$pisomorada = $_POST['pisomorada'];
$agua = $_POST['agua'];
$luz = $_POST['luz'];
$lixo = $_POST['lixo'];
$banheiro = $_POST['banheiro'];
$esgoto = $_POST['esgoto'];
$nrcomodos = $_POST['nrcomodos'];
$nrpessoas = $_POST['nrpessoas'];
$nrfamilia = $_POST['nrfamilia'];

$empregado = $_POST['empregado'];
$profissao = $_POST['profissao'];
$renda = $_POST['renda'];
$beneficio = $_POST['beneficio'];
$beneficiodescricao = $_POST['beneficiodescricao'];
$beneficiovalor = $_POST['beneficiovalor'];
$id = $_POST['id'];

$renda = str_replace('.', '', $renda);
$renda = str_replace(',', '.', $renda);

$beneficiovalor = str_replace('.', '', $beneficiovalor);
$beneficiovalor = str_replace(',', '.', $beneficiovalor);

$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$fotoresidencia = $res[0]['fotoresidencia'];
}else{
	$fotoresidencia = './images/arquivos/sem-foto.png';
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['fotoresidencia']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);
$caminho = '../images/arquivos/' .$nome_img;

$imagem_temp = @$_FILES['fotoresidencia']['tmp_name']; 

if(@$_FILES['fotoresidencia']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg'or $ext == 'pdf'){ 

		if (@$_FILES['fotoresidencia']['name'] != ""){

			//EXCLUO A FOTO ANTERIOR
			if($fotoresidencia != "sem-foto.png"){
				@unlink('../images/arquivos/'.$fotoresidencia);
			}

			$fotoresidencia = $nome_img;
		}

		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}
//echo "renda: ".$renda;
//echo "rendaF: ".$rendaF;
//exit();



if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET cep = :cep, rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, email = :email, redesocial = '$redesocial', descricaoredesocial = :descricaoredesocial, telefone = :telefone, localizacao = '$localizacao', moradia = '$moradia', tipmorada = '$tipmorada', tipconstrucao = '$tipconstrucao', pisomorada = '$pisomorada', agua = '$agua', luz = '$luz', lixo = '$lixo', banheiro = '$banheiro', esgoto = '$esgoto', nrcomodos = '$nrcomodos', nrpessoas = '$nrpessoas', nrfamilia = '$nrfamilia', empregado = '$empregado', profissao = :profissao, renda = :renda, beneficio = '$beneficio',	beneficiodescricao = :beneficiodescricao, beneficiovalor = :beneficiovalor");
	$acao = 'inserção';
	
}else{
	$query = $pdo->prepare("UPDATE $tabela SET 
		cep = :cep, 
		numero = :numero, 
		rua = :rua,
		bairro = :bairro, 
		cidade = :cidade, 
		email = :email,
		redesocial = '$redesocial', 
		descricaoredesocial = :descricaoredesocial, 
		telefone = :telefone,
		localizacao = '$localizacao', 
		moradia = '$moradia', 
		tipmorada = '$tipmorada',
		tipconstrucao = '$tipconstrucao',
		pisomorada = '$pisomorada',
		agua = '$agua', 
		luz = '$luz', 
		lixo = '$lixo',
		banheiro = '$banheiro',
		esgoto = '$esgoto',
		nrcomodos = '$nrcomodos',
		nrpessoas = '$nrpessoas',
		nrfamilia = '$nrfamilia',
		empregado = '$empregado',
		profissao = :profissao,
		renda = :renda,
		beneficio = '$beneficio',
		beneficiodescricao = :beneficiodescricao,
		beneficiovalor = :beneficiovalor,
		fotoresidencia = '$fotoresidencia' where id = '$id'"); 
	$acao = 'edição';
	
	
}

	$query->bindValue(":cep", "$cep");
	$query->bindValue(":numero", "$numero");
	$query->bindValue(":rua", "$rua");
	$query->bindValue(":bairro", "$bairro");
	$query->bindValue(":cidade", "$cidade");
	$query->bindValue(":email", "$email");
	$query->bindValue(":descricaoredesocial", "$descricaoredesocial");
	$query->bindValue(":telefone", "$telefone");
	$query->bindValue(":profissao", "$profissao");
	$query->bindValue(":renda", "$renda");
	$query->bindValue(":beneficiodescricao", "$beneficiodescricao");
	$query->bindValue(":beneficiovalor", "$beneficiovalor");

	$query->execute();
	$ult_id = $pdo->lastInsertId();


if(@$ult_id == "" || @$ult_id == 0){
	$ult_id = $id;
}


echo 'Salvo com Sucesso';

 ?>