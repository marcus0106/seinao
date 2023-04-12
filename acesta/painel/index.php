<?php
@session_start();
require_once('../conexao.php');
if (@$_SESSION['id_beneficiario'] == "") {
	echo "<script>window.location='../index.php'</script>";
	exit();
}

require_once("cabecalho.php");



$id = $_SESSION['id_beneficiario'];
//recuperar os dados do usuário logado
$query = $pdo->query("SELECT * FROM beneficiarios where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg > 0) {
	$nome_ben = $res[0]['nome'];
	$nome_infor_ben = $res[0]['nome_infor'];
	$nomesocial_ben = $res[0]['nomesocial'];
	$sexo_ben = $res[0]['sexo'];
	$racacor_ben = $res[0]['racacor'];
	$etnia_ben = $res[0]['etnia'];
	$tipodoc_ben = $res[0]['tipodoc'];
	$docnum_ben = $res[0]['docnum'];
	$docorgao_ben = $res[0]['docorgao'];
	$docexpedicao_ben = $res[0]['docexpedicao'];
	$estadocivil_ben = $res[0]['estadocivil'];
	$natura_ben = $res[0]['natura'];
	$nacional_ben = $res[0]['nacional'];
	$religiao_ben = $res[0]['religiao'];
	$datanasc_ben = $res[0]['datanasc'];
	$pai_ben = $res[0]['pai'];
	$mae_ben = $res[0]['mae'];
	$escolaridade_ben = $res[0]['escolaridade'];
	$ensino_ben = $res[0]['ensino'];
	$reservista_ben = $res[0]['reservista'];
	$clt_ben = $res[0]['clt'];
	$cartaosus_ben = $res[0]['cartaosus'];
	$cartaovacina_ben = $res[0]['cartaovacina'];
	$foto_ben = $res[0]['foto'];
	$fotorg_ben = $res[0]['fotorg'];
	$cpf_ben = $res[0]['cpf'];
}

$query = $pdo->query("SELECT * FROM racacor where id = '$racacor_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	$nome_racacor_ben = $res[0]['nome'];
} else {
	$nome_racacor_ben = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM etnia where id = '$etnia_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	$nome_etnia_ben = $res[0]['nome'];
} else {
	$nome_etnia_ben = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM estado where id = '$natura_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	$nome_natural_ben = $res[0]['nome'];
} else {
	$nome_natural_ben = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM paises where id = '$nacional_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	$nome_nacional_ben = $res[0]['nome'];
} else {
	$nome_nacional_ben = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM religiao where id = '$religiao_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	$nome_religiao_ben = $res[0]['nome'];
} else {
	$nome_religiao_ben = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM orgaoemissor where id = '$docorgao_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	$nome_docorgao_ben = $res[0]['sigla'];
} else {
	$nome_docorgao_ben = 'clique aqui';
}

if (is_null($sexo_ben)) {
	$sexo_benF = 'clique aqui';
} else {
	$sexo_benF = $sexo_ben;
}

if (is_null($escolaridade_ben)) {
	$escolaridade_benF = 'clique aqui';
} else {
	$escolaridade_benF = $escolaridade_ben;
}

if (is_null($ensino_ben)) {
	$ensino_benF = 'clique aqui';
} else {
	$ensino_benF = $ensino_ben;
}

if (is_null($tipodoc_ben)) {
	$tipodoc_benF = 'clique aqui';
} else {
	$tipodoc_benF = $tipodoc_ben;
}
//echo "raça:" .$racacor_ben;
//echo " - sexo:" .$sexo_ben;
//echo " - etnia:" .$etnia_ben;
?>

<form id="form-pessoais" method="POST">
	<div class="row">
		<div class="col-md-4">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Nome Informado</label>
				<input name="nome" id="nome" type="text" class="form-control" placeholder="Nome completo do beneficiário" value="<?php echo $nome_ben ?>" readonly>
			</div>
		</div>

		<div class="col-md-4">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Nome Completo do Beneficiário</label>
				<input name="nome_infor" id="nome_infor" type="text" class="form-control" placeholder="Informe seu nome caso esteja incorreto" value="<?php echo $nome_infor_ben ?>" required>
			</div>
		</div>

		<div class="col-md-2 col-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Nome Social</label>
				<input name="nomesocial" id="nomesocial" type="text" class="form-control" placeholder="Caso possua" value="<?php echo $nomesocial_ben ?>">
			</div>
		</div>

		<div class="col-md-2 col-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Data de Nascimento</label>
				<input name="datanasc" id="datanasc" type="date" class="form-control" required value="<?= $datanasc_ben ?>">
			</div>
		</div>

	</div>


	<div class="row">

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Sexo</label>
				<select class="form-control" name="sexo" id="sexo" required>
					<option value="<?= $sexo_ben ?>"><?= $sexo_benF ?></option>
					<option value="M">M</option>
					<option value="F">F</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Raça/Cor</label>
				<select class="form-control" name="racacor" id="racacor" required>
					<option value="<?php echo $racacor_ben ?>"><?php echo $nome_racacor_ben ?></option>
					<?php
					$query = $pdo->query("SELECT * FROM racacor");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					for ($i = 0; $i < @count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
					?>
						<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Etnia</label>
				<select class="form-control" name="etnia" id="etnia" required>
					<option value="<?php echo $etnia_ben ?>"><?php echo $nome_etnia_ben ?></option>
					<?php
					$query = $pdo->query("SELECT * FROM etnia");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					for ($i = 0; $i < @count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
					?>
						<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Natural Estado</label>
				<select class="form-control" name="natura" id="natura" required>
					<option value="<?php echo $natura_ben ?>"><?php echo $nome_natural_ben ?></option>
					<?php
					$query = $pdo->query("SELECT * FROM estado");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					for ($i = 0; $i < @count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
					?>
						<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>País Origem</label>
				<select class="form-control" name="nacional" id="nacional" required>
					<option value="<?php echo $nacional_ben ?>"><?php echo $nome_nacional_ben ?></option>
					<?php
					$query = $pdo->query("SELECT * FROM paises");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					for ($i = 0; $i < @count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
					?>
						<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Religião</label>
				<select class="form-control" name="religiao" id="religiao" required>
					<option value="<?php echo $religiao_ben ?>"><?php echo $nome_religiao_ben ?></option>
					<?php
					$query = $pdo->query("SELECT * FROM religiao");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					for ($i = 0; $i < @count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
					?>
						<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>

	</div>

	<div class="row">

		<div class="col-md-6 col-6">
			<div class="form-group mb-3">
				<label>Escolaridade</label>
				<select class="form-control" name="escolaridade" id="escolaridade" required>
					<option value="<?php echo $escolaridade_ben ?>"><?php echo $escolaridade_benF ?></option>
					<option value="Fundamental">Fundamental</option>
					<option value="Médio">Médio</option>
					<option value="Superior">Superior</option>
				</select>
			</div>
		</div>

		<div class="col-md-6 col-6">
			<div class="form-group mb-3">
				<label>Ensino</label>
				<select class="form-control" name="ensino" id="ensino" required>
					<option value="<?php echo $ensino_ben ?>"><?php echo $ensino_benF ?></option>
					<option value="Completo">Completo</option>
					<option value="Incompleto">Incompleto</option>
					<option value="Cursando">Cursando</option>
				</select>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-3 col-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Documento de Identificação</label>
				<select class="form-control" name="tipodoc" id="tipodoc" required>
					<option value="<?php echo $tipodoc_ben ?>"><?php echo $tipodoc_benF ?></option>
					<option value="Registro Geral">RG</option>
					<option value="Registro Administrativo de Nascimento de Indígena">RANI</option>
					<option value="Registro Nacional Migratório">RNM</option>
					<option value="Registro Nacional do Estrangeiro">RNE</option>
				</select>
			</div>
		</div>

		<div class="col-md-3 col-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Número documento</label>
				<input name="docnum" type="text" class="form-control" placeholder="Digite o Nr do documento" value="<?= $docnum_ben ?>" required>
			</div>
		</div>

		<div class="col-md-3 col-6">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Órgão Emissor</label>
				<select class="form-control" name="docorgao" id="docorgao" required>
					<option value="<?php echo $docorgao_ben ?>"><?php echo $nome_docorgao_ben ?></option>
					<?php
					$query = $pdo->query("SELECT * FROM orgaoemissor");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					for ($i = 0; $i < @count($res); $i++) {
						foreach ($res[$i] as $key => $value) {
						}
					?>
						<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['sigla'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-md-3 col-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Data Emissão</label>
				<input name="docexpedicao" id="docexpedicao" type="date" class="form-control" value="<?= $docexpedicao_ben ?>" required>
			</div>
		</div>


	</div>


	<div class="row">
		<div class="col-md-3">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Carteira Reservista</label>
				<input name="reservista" type="text" class="form-control" placeholder="Se Houver" value="<?= $reservista_ben ?>">
			</div>
		</div>

		<div class="col-md-3">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Carteira de Trabalho</label>
				<input name="clt" type="text" class="form-control" placeholder="Se Houver" value="<?= $clt_ben ?>">
			</div>
		</div>

		<div class="col-md-3">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Cartão do SUS</label>
				<input name="cartaosus" type="text" class="form-control" placeholder="Se Houver" value="<?= $cartaosus_ben ?>">
			</div>
		</div>

		<div class="col-md-3">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Cartão de Vacina</label>
				<input name="cartaovacina" type="text" class="form-control" placeholder="Se Houver" value="<?= $cartaovacina_ben ?>">
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Pai</label>
				<input name="pai" type="text" class="form-control" placeholder="Digite o nome completo do pai" value="<?= $pai_ben ?>" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Mãe</label>
				<input name="mae" type="text" class="form-control" placeholder="Digite o nome completo do mãe" value="<?php echo $mae_ben ?>" required>
			</div>
		</div>
	</div>


	<div class="row">


		<div class="col-md-4">
			<div class="mb-2">
				<label for="exampleFormControlInput1" class="form-label">Anexar Comprovante de RG e CPF (*png, jpg, jpeg, pdf)</label>
				<input id="fotorg" name="fotorg" type="file" class="form-control" onchange="alterarImg('target-foto-rg', 'fotorg')" required>
			</div>

			<div class="mb-2">
				<div>
					<img id="target-foto-rg" src="images/arquivos/<?php echo $fotorg_ben ?>" class="rounded-7" alt="" style="width:150px;" />
				</div>
			</div>

		</div>

		<div class="col-md-2"></div>

		<div class="col-md-4">
			<div class="mb-2">
				<label for="exampleFormControlInput1" class="form-label">Foto (*png, jpg, jpeg)</label>
				<input id="foto" name="foto" type="file" class="form-control" onchange="alterarImg('target-foto', 'foto')" required>
			</div>

			<div class="col-md-2">
				<div>
					<img id="target-foto" src="images/perfil/<?= $foto_ben ?>" class="rounded-7" alt="sem foto" style="width:150px;" />
				</div>
			</div>
		</div>



	</div>

	<input type="hidden" name="id" id="id" value="<?php echo $id ?>">

	&nbsp;

	<div align="right">
		<a href="./economico.php">
			<button class="btn btn-primary" type="submit">Próximo</button>
		</a>
	</div>

	<small>
		<div id="mensagem-pessoais" align="center"></div>
	</small>

</form>

<br><br>
</div>




<script type="text/javascript">
	$("#form-pessoais").submit(function() {
		$('#mensagem-pessoais').text('...Carregando!')

		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "scripts/salvar-pessoais.php",
			type: 'POST',
			data: formData,

			success: function(mensagem) {
				$('#mensagem-pessoais').text('');
				$('#mensagem-pessoais').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {
					//location.reload();
					$('#mensagem-pessoais').addClass('text-success')
					$('#mensagem-pessoais').text(mensagem)
					window.location = 'economico.php';
				} else {
					$('#mensagem-pessoais').addClass('text-danger')
					$('#mensagem-pessoais').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});
</script>