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
	//$foto_ben = $res[0]['foto'];
	$cpf_ben = $res[0]['cpf'];
	$sexo_ben = $res[0]['sexo'];
	$cidade_ben = $res[0]['cidade'];
	$bairro_ben = $res[0]['bairro'];
	$rua_ben = $res[0]['rua'];
	$numero_ben = $res[0]['numero'];
	$cep_ben = $res[0]['cep'];
	$email_ben = $res[0]['email'];
	$redesocial_ben = $res[0]['redesocial'];
	$descricaorede_ben = $res[0]['descricaoredesocial'];
	$telefone_ben = $res[0]['telefone'];
	$localizacao_ben = $res[0]['localizacao'];
	$moradia_ben = $res[0]['moradia'];
	$tipmoradia_ben = $res[0]['tipmorada'];
	$tipconstrucao_ben = $res[0]['tipconstrucao'];
	$pisomoradia_ben = $res[0]['pisomorada'];
	$agua_ben = $res[0]['agua'];
	$luz_ben = $res[0]['luz'];
	$lixo_ben = $res[0]['lixo'];
	$banheiro_ben = $res[0]['banheiro'];
	$esgoto_ben = $res[0]['esgoto'];
	$nrcomodos_ben = $res[0]['nrcomodos'];
	$nrpessoas_ben = $res[0]['nrpessoas'];
	$nrfamilia_ben = $res[0]['nrfamilia'];
	$empregado_ben = $res[0]['empregado'];
	$profissao_ben = $res[0]['profissao'];
	$renda_ben = $res[0]['renda'];
	$beneficio_ben = $res[0]['beneficio'];
	$beneficiodescri_ben = $res[0]['beneficiodescricao'];
	$beneficiovalor_ben = $res[0]['beneficiovalor'];
	$fotoresidencia_ben = $res[0]['fotoresidencia'];
}

//extensão do arquivo
$ext = pathinfo($fotoresidencia_ben, PATHINFO_EXTENSION);
if ($ext == 'pdf') {
	$tumb_arquivo = 'pdf.png';
} else if ($ext == 'rar' || $ext == 'zip') {
	$tumb_arquivo = 'rar.png';
} else if ($ext == 'doc' || $ext == 'docx' || $ext == 'txt') {
	$tumb_arquivo = 'word.png';
} else if ($ext == 'png' || $ext == 'jpeg' || $ext == 'jpg') {
	$tumb_arquivo = 'local.png';
} else if ($ext == 'xml') {
	$tumb_arquivo = 'xml.png';
} else {
	$tumb_arquivo = $fotoresidencia_ben;
}

if (is_null($redesocial_ben)) {
	$redesocial_benF = 'clique aqui';
} else {
	$redesocial_benF = $redesocial_ben;
}

if (is_null($localizacao_ben)) {
	$localizacao_benF = 'clique aqui';
} else {
	$localizacao_benF = $localizacao_ben;
}

if (is_null($moradia_ben)) {
	$moradia_benF = 'clique aqui';
} else {
	$moradia_benF = $moradia_ben;
}

if (is_null($tipmoradia_ben)) {
	$tipmoradia_benF = 'clique aqui';
} else {
	$tipmoradia_benF = $tipmoradia_ben;
}

if (is_null($tipconstrucao_ben)) {
	$tipconstrucao_benF = 'clique aqui';
} else {
	$tipconstrucao_benF = $tipconstrucao_ben;
}

if (is_null($pisomoradia_ben)) {
	$pisomoradia_benF = 'clique aqui';
} else {
	$pisomoradia_benF = $pisomoradia_ben;
}

if (is_null($agua_ben)) {
	$agua_benF = 'clique aqui';
} else {
	$agua_benF = $agua_ben;
}

if (is_null($luz_ben)) {
	$luz_benF = 'clique aqui';
} else {
	$luz_benF = $luz_ben;
}

if (is_null($lixo_ben)) {
	$lixo_benF = 'clique aqui';
} else {
	$lixo_benF = $lixo_ben;
}

if (is_null($banheiro_ben)) {
	$banheiro_benF = 'clique aqui';
} else {
	$banheiro_benF = $banheiro_ben;
}

if (is_null($esgoto_ben)) {
	$esgoto_benF = 'clique aqui';
} else {
	$esgoto_benF = $esgoto_ben;
}

if (is_null($nrcomodos_ben)) {
	$nrcomodos_benF = 'clique aqui';
} else {
	$nrcomodos_benF = $nrcomodos_ben;
}

if (is_null($nrpessoas_ben)) {
	$nrpessoas_benF = 'clique aqui';
} else {
	$nrpessoas_benF = $nrpessoas_ben;
}

if (is_null($nrfamilia_ben)) {
	$nrfamilia_benF = 'clique aqui';
} else {
	$nrfamilia_benF = $nrfamilia_ben;
}

if (is_null($empregado_ben)) {
	$empregado_benF = 'clique aqui';
} else {
	$empregado_benF = $empregado_ben;
}

if (is_null($beneficio_ben)) {
	$beneficio_benF = 'clique aqui';
} else {
	$beneficio_benF = $beneficio_ben;
}

?>
<script type="text/javascript" src="./js/api.js"></script>

<form id="form-economico" method="POST">
	<div class="row">
		<div class="col-md-4">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Nome do Beneficiário</label>
				<input name="nome" type="text" class="form-control" placeholder="Nome do completo do beneficiário" value="<?= $nome_ben ?>" disabled>
			</div>
		</div>

		<div class="col-md-4"></div>

		<div class="col-md-4">
			<div class="mb-2">
				<label for="exampleFormControlInput1" class="form-label">Anexar Comprovante de Residência (*png, jpg, jpeg, pdf)</label>
				<!-- funciona normarl -->
				<input id="fotoresidencia" name="fotoresidencia" type="file" class="form-control" onchange="alterarImg('target-foto-residencia', 'fotoresidencia')" required>
				<!-- funciona normarl -->

			</div>

			<div class="mb-2">
				<div>
				<img id="target-foto-residencia" src="images/arquivos/<?php echo $fotoresidencia_ben ?>" class="rounded-7" alt="" style="width:100px;" />
				</div>
			</div>

		</div>

	</div>
	<div class="row">

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">CEP</label>
				<input class="form-control" name="cep" type="text" id="cep" value="<?= $cep_ben ?>" size="10" maxlength="9" onblur="pesquisacep(this.value);" required>
			</div>
		</div>

		<div class="col-md-3 col-8">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Rua</label>
				<input name="rua" id="rua" type="text" class="form-control" readonly value="<?= $rua_ben ?>">
			</div>
		</div>

		<div class="col-md-1 col-8">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Nº</label>
				<input name="numero" id="numero" type="text" class="form-control" placeholder="XX" value="<?= $numero_ben ?>" required>
			</div>
		</div>

		<div class="col-md-3 col-6">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Bairro</label>
				<input name="bairro" id="bairro" type="text" class="form-control" readonly value="<?= $bairro_ben ?>">
			</div>
		</div>

		<div class="col-md-3 col-6">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Município</label>
				<input name="cidade" id="cidade" type="text" class="form-control" readonly value="<?= $cidade_ben ?>">
			</div>
		</div>



	</div>


	<div class="row">

		<div class="col-md-4">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Email</label>
				<input name="email" id="email" type="email" class="form-control" value="<?= $email_ben ?>">
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Rede Social</label>
				<select class="form-control" name="redesocial" id="redesocial" required>
					<option value="<?= $redesocial_ben ?>"><?= $redesocial_benF ?></option>
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
				<input name="descricaoredesocial" id="descricaoredesocial" type="text" class="form-control" value="<?= $descricaorede_ben ?>">
			</div>
		</div>

		<div class="col-md-2 col-5">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Telefone</label>
				<input name="telefone" id="telefone" type="text" class="form-control" required value="<?= $telefone_ben ?>">
			</div>
		</div>

	</div>
	<hr>

	<div class="row">
		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Localização</label>
				<select class="form-control" name="localizacao" id="localizacao" required>
					<option value="<?= $localizacao_ben ?>"><?= $localizacao_benF ?></option>
					<option value="Urbana">Urbana</option>
					<option value="Rural">Rural</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Tipo Moradia</label>
				<select class="form-control" name="moradia" id="moradia" required>
					<option value="<?= $moradia_ben ?>"><?= $moradia_benF ?></option>
					<option value="Casa">Casa</option>
					<option value="Vila">Vila</option>
					<option value="Abrigo">Abrigo</option>
					<option value="Irregular">Irregular</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Situação Moradia</label>
				<select class="form-control" name="tipmorada" id="tipmorada" required>
					<option value="<?= $tipmoradia_ben ?>"><?= $tipmoradia_benF ?></option>
					<option value="Própria">Própria</option>
					<option value="Alugada">Alugada</option>
					<option value="Abrigo">Abrigo</option>
					<option value="Cedida">Cedida</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Tipo Construção</label>
				<select class="form-control" name="tipconstrucao" id="tipconstrucao" required>
					<option value="<?= $tipconstrucao_ben ?>"><?= $tipconstrucao_benF ?></option>
					<option value="Alvenaria">Alvenaria</option>
					<option value="Madeira">Madeira</option>
					<option value="Mista">Mista</option>
					<option value="Taipo">Taipo</option>
					<option value="Abrigo">Abrigo</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Piso Imóvel</label>
				<select class="form-control" name="pisomorada" id="pisomorada" required>
					<option value="<?= $pisomoradia_ben ?>"><?= $pisomoradia_benF ?></option>
					<option value="Porcelanato">Porcelanato</option>
					<option value="Cerâmica">Cerâmica</option>
					<option value="Cimento">Cimento</option>
					<option value="Madeira">Madeira</option>
					<option value="Barro">Barro</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Consumo Água</label>
				<select class="form-control" name="agua" id="agua" required>
					<option value="<?= $agua_ben ?>"><?= $agua_benF ?></option>
					<option value="Rede Geral">Rede Geral</option>
					<option value="Poço">Poço</option>
					<option value="Cisterna">Cisterna</option>
					<option value="Outros">Outros</option>
				</select>
			</div>
		</div>

	</div>


	<div class="row">
		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Rede Elétrica</label>
				<select class="form-control" name="luz" id="luz" required>
					<option value="<?= $luz_ben ?>"><?= $luz_benF ?></option>
					<option value="Sim">Sim</option>
					<option value="Não">Não</option>
					<option value="Clandestino">Clandestino</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Coleta Lixo</label>
				<select class="form-control" name="lixo" id="lixo" required>
					<option value="<?= $lixo_ben ?>"><?= $lixo_benF ?></option>
					<option value="Sim">Sim</option>
					<option value="Não">Não</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Banheiro interno</label>
				<select class="form-control" name="banheiro" id="banheiro" required>
					<option value="<?= $banheiro_ben ?>"><?= $banheiro_benF ?></option>
					<option value="Sim">Sim</option>
					<option value="Não">Não</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Sistema Esgoto</label>
				<select class="form-control" name="esgoto" id="esgoto" required>
					<option value="<?= $esgoto_ben ?>"><?= $esgoto_benF ?></option>
					<option value="Tratado">Tratado</option>
					<option value="Fossa">Fossa Séptica</option>
					<option value="Vala">Vala</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Nr Comodos <small><small><small><small>(na Residência)</small></small></small></small></label>
				<select class="form-control" name="nrcomodos" id="nrcomodos" required>
					<option value="<?= $nrcomodos_ben ?>"><?= $nrcomodos_benF ?></option>
					<option value="1">01</option>
					<option value="2">02</option>
					<option value="3">03</option>
					<option value="4">04</option>
					<option value="5">05</option>
					<option value="6">06</option>
					<option value="7">07</option>
					<option value="8">08</option>
					<option value="9">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label>Pessoas Família <small><small><small><small>(Quantidade)</small></small></small></small></label>
				<select class="form-control" name="nrpessoas" id="nrpessoas" required>
					<option value="<?= $nrpessoas_ben ?>"><?= $nrpessoas_benF ?></option>
					<option value="" disabled hidden>clique aqui</option>
					<option value="1">01</option>
					<option value="2">02</option>
					<option value="3">03</option>
					<option value="4">04</option>
					<option value="5">05</option>
					<option value="6">06</option>
					<option value="7">07</option>
					<option value="8">08</option>
					<option value="9">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
				</select>
			</div>
		</div>

	</div>




	<div class="row">
		<div class="col-md-2 col-8">
			<div class="form-group mb-3">
				<label>Famílias Domicílio <small><small><small><small>(Quantidade)</small></small></small></small></label>
				<select class="form-control" name="nrfamilia" id="nrfamilia" required>
					<option value="<?= $nrfamilia_ben ?>"><?= $nrfamilia_benF ?></option>
					<option value="" disabled hidden>clique aqui</option>
					<option value="1">01</option>
					<option value="2">02</option>
					<option value="3">03</option>
					<option value="4">04</option>
					<option value="5">05</option>
					<option value="6">06</option>
					<option value="7">07</option>
					<option value="8">08</option>
					<option value="9">09</option>
				</select>
			</div>
		</div>

	</div>
	<hr>

	<div class="row">
		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Empregado?</label>
				<select class="form-control" name="empregado" id="empregado" required>
					<option value="<?= $empregado_ben ?>"><?= $empregado_benF ?></option>
					<option value="" disabled hidden>clique aqui</option>
					<option value="Sim">Sim</option>
					<option value="Não">Não</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4" id="profissao">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Profissão</label>
				<input name="profissao" type="text" class="form-control" placeholder="Ex. Autônomo" value="<?= $profissao_ben ?>">
			</div>
		</div>

		<div class="col-md-2 col-4">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Renda Familiar</label>
				<input name="renda" id="reais" type="text" class="form-control" placeholder="" value="<?= $renda_ben ?>" required>
			</div>
		</div>


		<div class="col-md-2 col-4">
			<div class="form-group mb-3">
				<label for="exampleFormControlInput1" class="form-label">Benefício Social?</label>
				<select class="form-control" name="beneficio" id="beneficio" required>
					<option value="<?= $beneficio_ben ?>"><?= $beneficio_benF ?></option>
					<option value="" disabled hidden>clique aqui</option>
					<option value="Sim">Sim</option>
					<option value="Não">Não</option>
				</select>
			</div>
		</div>

		<div class="col-md-2 col-4" id="beneficiodescricao">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Qual Benefício?</label>
				<input name="beneficiodescricao" type="text" class="form-control" placeholder="Informe o nome" value="<?= $beneficiodescri_ben ?>">
			</div>
		</div>

		<div class="col-md-2 col-4" id="beneficiovalor">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Valor Benefício</label>
				<input name="beneficiovalor" id="reais1" type="text" class="form-control" placeholder="R$ 0,00" value="<?= $beneficiovalor_ben ?>">
			</div>
		</div>


	</div>


	<input type="hidden" name="id" id="id" value="<?php echo $id ?>">

	<br>
	<br>

	<div class="position-relative" align="center">
		<div class=" d-inline">
			<a href="./index.php">
				<button class="btn btn-primary" type="button">anterior</button>
			</a>
		</div>


		<div class="d-inline">
			<a href="./conjugue.php">
				<button class="btn btn-primary" type="submit">Próximo</button>
			</a>
		</div>
	</div>



	<small>
		<div id="mensagem-economico" align="center"></div>
	</small>

</form>

<br><br>
</div>

<script>
	$(document).ready(function() { // ao ler o documento

		document.getElementById('profissao').style.display = 'none';
		document.getElementById('beneficiodescricao').style.display = 'none';
		document.getElementById('beneficiovalor').style.display = 'none';


		$('#empregado').change(function() { // quando o combobox pretente_programa for modificada
			if ($(this).val() == 'Sim') { // se o valor for igual a Fisica				
				document.getElementById('profissao').style.display = 'block';
			} else if ($(this).val() == 'Não') {
				document.getElementById('profissao').style.display = 'none';
			} else {
				document.getElementById('profissao').style.display = 'none';
			}
		});

		$('#beneficio').change(function() { // quando o combobox pretente_programa for modificada
			if ($(this).val() == 'Sim') { // se o valor for igual a Fisica				
				document.getElementById('beneficiodescricao').style.display = 'block';
				document.getElementById('beneficiovalor').style.display = 'block';
			} else if ($(this).val() == 'Não') {
				document.getElementById('beneficiodescricao').style.display = 'none';
				document.getElementById('beneficiovalor').style.display = 'none';
			} else {
				document.getElementById('beneficiodescricao').style.display = 'none';
				document.getElementById('beneficiovalor').style.display = 'none';
			}
		});
	});
</script>


<script type="text/javascript">
	$("#form-economico").submit(function() {
		$('#mensagem-economico').text('...Carregando!')

		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "scripts/salvar-economico.php",
			type: 'POST',
			data: formData,

			success: function(mensagem) {
				$('#mensagem-economico').text('');
				$('#mensagem-economico').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {
					//location.reload();
					$('#mensagem-economico').addClass('text-success')
					$('#mensagem-economico').text(mensagem)
					window.location = 'conjugue.php';
				} else {
					$('#mensagem-economico').addClass('text-danger')
					$('#mensagem-economico').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});
</script>