<?php
@session_start();
require_once('../conexao.php');
if (@$_SESSION['id_beneficiario'] == "") {
	echo '<script>window.location="../index.php"</script>';
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
	//$foto_ben = $res[0]['foto'];
	$estadocivil_ben = $res[0]['estadocivil'];
	$nomeconjuge_ben = $res[0]['nomeconjugue'];
	$cpfconjuge_ben = $res[0]['cpfconjugue'];
	$datanasconjuge_ben = $res[0]['datanascconjugue'];
	$naturalconjuge_ben = $res[0]['naturalconjugue'];
	$nacionalconjuge_ben = $res[0]['nacionalconjugue'];
	$sexoconjuge_ben = $res[0]['sexoconjugue'];
	$racacorconjuge_ben = $res[0]['racacorconjugue'];
	$etniaconjuge_ben = $res[0]['etniaconjugue'];
	$paiconjuge_ben = $res[0]['paiconjugue'];
	$maeconjuge_ben = $res[0]['maeconjugue'];
	$escolaridadeconjuge_ben = $res[0]['escolaridadeconjugue'];
	$ensinoconjuge_ben = $res[0]['ensinoconjugue'];
	$emailconjuge_ben = $res[0]['emailconjugue'];
	$redesocialconjuge_ben = $res[0]['redesocialconjugue'];
	$descricaoredeconjuge_ben = $res[0]['descricaoredesocialconjugue'];
	$telefoneconjuge_ben = $res[0]['telefoneconjugue'];
}

$query = $pdo->query("SELECT * FROM racacor where id = '$racacorconjuge_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0){
	$racacorconjuge_benF = $res[0]['nome'];
}else{
	$racacorconjuge_benF = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM etnia where id = '$etniaconjuge_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$etniaconjuge_benF = $res[0]['nome'];
}else{
	$etniaconjuge_benF = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM estado where id = '$naturalconjuge_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$naturalconjuge_benF = $res[0]['nome'];
}else{
	$naturalconjuge_benF = 'clique aqui';
}

$query = $pdo->query("SELECT * FROM paises where id = '$nacionalconjuge_ben' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$nacionalconjuge_benF = $res[0]['nome'];
}else{
	$nacionalconjuge_benF = 'clique aqui';
}

if (is_null($estadocivil_ben)) {
	$estadocivil_benF = 'clique aqui';
}else{
	$estadocivil_benF = $estadocivil_ben;
}

if (is_null($sexoconjuge_ben)) {
	$sexoconjuge_benF = 'clique aqui';
}else{
	$sexoconjuge_benF = $sexoconjuge_ben;
}

if (is_null($escolaridadeconjuge_ben)) {
	$escolaridadeconjuge_benF = 'clique aqui';
}else{
	$escolaridadeconjuge_benF = $escolaridadeconjuge_ben;
}

if (is_null($escolaridadeconjuge_ben)) {
	$escolaridadeconjuge_benF = 'clique aqui';
}else{
	$escolaridadeconjuge_benF = $escolaridadeconjuge_ben;
}

if (is_null($ensinoconjuge_ben)) {
	$ensinoconjuge_benF = 'clique aqui';
}else{
	$ensinoconjuge_benF = $ensinoconjuge_ben;
}

if (is_null($redesocialconjuge_ben)) {
	$redesocialconjuge_benF = 'clique aqui';
}else{
	$redesocialconjuge_benF = $redesocialconjuge_ben;
}




?>

<form id="form-conjugue" method="POST">
	<div class="row">
		<div class="col-md-2">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Estado Civil</label>
				<select class="form-control" name="estadocivil" id="estadocivil" required>
					<option value="<?= $estadocivil_ben ?>"><?= $estadocivil_benF ?></option>
					<option id="Casado" value="Casado">Casado(a)</option>
					<option id="Solteiro" value="Solteiro">Solteiro(a)</option>
					<option id="UniaoEst" value="União Estável">União Estável</option>
					<option id="Viuvo" value="Viúvo">Viúvo(a)</option>
					<option id="Separado" value="Separado">Separado(a)</option>
					<option id="Divorciado" value="Divorciado">Divorciado(a)</option>
				</select>
			</div>
		</div>

	</div>


	<div id="conjugues">
		<div class="row">
			<div class="col-md-4">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Nome Cônjugue</label>
					<input name="nomeconjugue" id="nomeconjugue" type="text" class="form-control" placeholder="Informe nome completo" value="<?= $nomeconjuge_ben ?>" >
				</div>
			</div>

			<div class="col-md-2">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">CPF</label>
					<input name="cpfconjugue" id="cpfconjugue" type="text" class="form-control" placeholder="" value="<?= $cpfconjuge_ben ?>" >
				</div>
			</div>

			<div class="col-md-2">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Data de Nascimento</label>
					<input name="datanascconjugue" id="datanascconjugue" type="date" class="form-control"   value="<?= $datanasconjuge_ben ?>" >
				</div>
			</div>

			<div class="col-md-2">
				<div class="form-group mb-3">
					<label for="exampleFormControlInput1" class="form-label">Sexo</label>
					<select class="form-control" name="sexoconjugue" id="sexoconjugue" >
						<option value="<?= $sexoconjuge_ben ?>"><?= $sexoconjuge_benF ?></option>
						<option value="M">Masculino</option>
						<option value="F">Feminino</option>
					</select>
				</div>
			</div>

			<div class="col-md-2 col-5">
				<div class="form-group mb-3">
					<label for="exampleFormControlInput1" class="form-label">Telefone</label>
					<input name="telefoneconjugue" id="telefoneconjugue" type="text" class="form-control" value="<?= $telefoneconjuge_ben ?>" >
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 col-4">
				<div class="form-group mb-3">
					<label>Raça/Cor</label>
					<select class="form-control" name="racacorconjugue" id="racacorconjugue" >
						<option value="<?= $racacorconjuge_ben ?>"><?= $racacorconjuge_benF ?></option>
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
					<select class="form-control" name="etniaconjugue" id="etniaconjugue" >
						<option value="<?= $etniaconjuge_ben ?>"><?= $etniaconjuge_benF ?></option>
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
					<label>Natural do Estado</label>
					<select class="form-control" name="naturalconjugue" id="naturalconjugue"  >
						<option value="<?= $naturalconjuge_ben ?>"><?= $naturalconjuge_benF ?></option>
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
					<label>País de Origem</label>
					<select class="form-control" name="nacionalconjugue" id="nacionalconjugue"  >
						<option value="<?= $nacionalconjuge_ben ?>"><?= $nacionalconjuge_benF ?></option>
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

			<div class="col-md-2">
				<div class="form-group mb-3">
					<label>Escolaridade</label>
					<select class="form-control" name="escolaridadeconjugue" id="escolaridadeconjugue"  >
						<option value="<?= $escolaridadeconjuge_ben ?>"><?= $escolaridadeconjuge_benF ?></option>
						<option value="Fundamental">Fundamental</option>
						<option value="Médio">Médio</option>
						<option value="Superior">Superior</option>
					</select>
				</div>
			</div>

			<div class="col-md-2">
				<div class="form-group mb-3">
					<label>Ensino</label>
					<select class="form-control" name="ensinoconjugue" id="ensinoconjugue"  >
						<option value="<?= $ensinoconjuge_ben ?>"><?= $ensinoconjuge_benF ?></option>
						<option value="Completo">Completo</option>
						<option value="Incompleto">Incompleto</option>
						<option value="Cursando">Cursando</option>
					</select>
				</div>
			</div>


		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group mb-3">
					<label for="exampleFormControlInput1" class="form-label">Email</label>
					<input name="emailconjugue" id="emailconjugue" type="email" class="form-control" value="<?= $emailconjuge_ben ?>">
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-2 col-4">
				<div class="form-group mb-3">
					<label for="exampleFormControlInput1" class="form-label">Rede Social</label>
					<select class="form-control" name="redesocialconjugue" id="redesocialconjugue"  >
						<option value="<?= $redesocialconjuge_ben ?>"><?= $redesocialconjuge_benF ?></option>
						<option value="" disabled hidden>clique aqui</option>
						<option value="Não possui">Não possuo</option>
						<option value="Facebook">Facebook</option>
						<option value="Instagram">Instagram</option>
						<option value="Linkdin">Linkdin</option>
					</select>
				</div>
			</div>

			<div class="col-md-4 col-8">
				<div class="form-group mb-3">
					<label for="exampleFormControlInput1" class="form-label">Descrição Rede Social</label>
					<input name="descricaoredesocialconjugue" id="descricaoredesocialconjugue" type="text" class="form-control" value="<?= $descricaoredeconjuge_ben ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Pai</label>
					<input name="paiconjugue" id="paiconjugue" type="text" class="form-control" placeholder="Digite o nome completo do pai" value="<?= $paiconjuge_ben ?>"  >
				</div>
			</div>

			<div class="col-md-3">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Mãe</label>
					<input name="maeconjugue" id="maeconjugue" type="text" class="form-control" placeholder="Digite o nome completo do mãe" value="<?= $maeconjuge_ben ?>"  >
				</div>
			</div>
		</div>
	</div>


	<input type="hidden" name="id" id="id" value="<?php echo $id ?>">

	<br>
	<br>

	<div class="position-relative"  align="center">
		<div class=" d-inline">
			<a href="./economico.php">
			<button class="btn btn-primary" type="button">anterior</button>
			</a>
		</div>


		<div class="d-inline">
			<a href="./dependentes.php">
			<button class="btn btn-primary" type="submit">Próximo</button>
			</a>
		</div>
	</div>



	<small>
		<div id="mensagem-conjugue" align="center"></div>
	</small>
</form>

<br><br>
</div>


<script>
	$(document).ready(function() { // ao ler o documento

		$('#estadocivil').change(function() { // quando o combobox pretente_programa for modificada
			if ($(this).val() == 'Solteiro') { // se o valor for igual a Fisica				
				document.getElementById('conjugues').style.display = 'none';
			} else if ($(this).val() == 'Viúvo') {
				document.getElementById('conjugues').style.display = 'none';
			} else if ($(this).val() == 'Separado') {
				document.getElementById('conjugues').style.display = 'none';
			} else if ($(this).val() == 'Divorciado') {
				document.getElementById('conjugues').style.display = 'none';
			} else {
				document.getElementById('conjugues').style.display = 'block';
			}
		});

	});
</script>



<script>
	$(document).ready(function() { // ao ler o documento

		$('#estadocivil').change(function() { // quando o combobox pretente_programa for modificada
			if ($(this).val() == 'Solteiro') { // se o valor for igual a Fisica				
				document.getElementById('conjugues').style.display = 'none';
			} else if ($(this).val() == 'Viúvo') {
				document.getElementById('conjugues').style.display = 'none';
			} else if ($(this).val() == 'Separado') {
				document.getElementById('conjugues').style.display = 'none';
			} else if ($(this).val() == 'Divorciado') {
				document.getElementById('conjugues').style.display = 'none';
			} else {
				document.getElementById('conjugues').style.display = 'block';
			}
		});

	});
</script>



<script type="text/javascript">
	$("#form-conjugue").submit(function() {
		$('#mensagem-conjugue').text('...Carregando!')

		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "scripts/salvar-conjugue.php",
			type: 'POST',
			data: formData,

			success: function(mensagem) {
				$('#mensagem-conjugue').text('');
				$('#mensagem-conjugue').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {
					//location.reload();
					$('#mensagem-conjugue').addClass('text-success')
					$('#mensagem-conjugue').text(mensagem)
					window.location = 'dependentes.php';
				} else {
					$('#mensagem-conjugue').addClass('text-danger')
					$('#mensagem-conjugue').text(mensagem)
				}

			},

			cache: false,
			contentType: false,
			processData: false,

		});
	});
</script>




<script type="text/javascript" src="./js/conjuge.js"></script>



<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>