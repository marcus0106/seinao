<?php 
@session_start();
require_once('../conexao.php');
if(@$_SESSION['id_beneficiario'] == ""){	
	echo '<script>window.location="../index.php"</script>';
	exit();
}

require_once("cabecalho.php");
$pag = 'dependentes';
?>
<style>
    .load {
    width: 100px;
    height: 100px;
    position: absolute;
    top: 30%;
    left: 45%;
    color: blue;
 }
</style>

<div class="row">
	<div class="col-md-3">
		<div class="mb-3">
			<label>RELAÇÃO DE DEPENDENTES</label>
		</div>
	</div>
</div>

<hr>
<a class="btn btn-primary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri"> <i class="fas fa-user-plus"></i>&nbsp; Novo Dependente</a>




<div class="bs-example widget-shadow" style="padding:15px" id="listar">
	<div class="load"> 
		<!--<i class="fa fa-cog fa-spin fa-5x fa-fw"></i><span class="sr-only"></span>-->
		<img src="../img/loading.gif">
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="tituloModal">Ficha do Dependente</h4>
				<!--<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true">&times;</span>
				</button>-->
				<button id="btn-fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					
				</button>
			</div>
			<form method="post" id="form-dependente">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Nome do Dependente</label>
								<input name="nome" id="nome" type="text" class="form-control" placeholder="Informe nome completo">
							</div>
						</div>
					</div>

					<div class="row">
						
						<div class="col-md-4 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">CPF</label>
								<input name="cpf" id="cpf" type="text" class="form-control" placeholder="CPF do dependente">
							</div>
						</div>

						<div class="col-md-2 col-6">						
							<div class="form-group mb-3"> 
								<label for="exampleFormControlInput1" class="form-label">Sexo</label> 
								<select class="form-control" name="sexo" id="sexo" required> 
									<option value="" selected disabled hidden>clique aqui</option>
									<option value="F">Feminino</option>
									<option value="M">Masculino</option>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-6">						
							<div class="form-group mb-3"> 
								<label for="exampleFormControlInput1" class="form-label">Parentesco</label> 
								<select class="form-control" name="parentesco" id="parentesco" required> 
									<option value="" selected disabled hidden>clique aqui</option>
									<option value="Filho">Filho(a)</option>
									<option value="Enteado">Enteado(a)</option>
									<option value="Neto">Neto(a)</option>
									<option value="Pai">Pai</option>
									<option value="Mãe">Mãe</option>
									<option value="Sogro">Sogro</option>
									<option value="irmão">irmã(o)</option>
									<option value="Genro">Genro</option>
									<option value="Nora">Nora</option>
									<option value="Outro parente">Outro parente</option>
									<option value="Não Parente">Não Parente</option>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Data Nascimento</label>
								<input name="datanasc" id="datanasc" type="date" class="form-control" required>
							</div>
						</div>

					</div>


					<div class="row">

						<div class="col-md-2 col-4">						
							<div class="form-group mb-3"> 
								<label>Religião</label> 
								<select class="form-control" name="religiao" id="religiao" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<?php
									$query = $pdo->query("SELECT * FROM religiao");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){}
											?>
										<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-2 col-4">						
							<div class="form-group mb-3"> 
								<label>Raça/Cor</label> 
								<select class="form-control" name="racacor" id="racacor" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<?php
									$query = $pdo->query("SELECT * FROM racacor");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){}
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
									<option value="" selected disabled hidden>clique aqui</option>
									<?php
									$query = $pdo->query("SELECT * FROM etnia");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){}
											?>
										<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-6">						
							<div class="form-group mb-3"> 
								<label>Natural Estado</label> 
								<select class="form-control" name="natura" id="natura" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<?php
									$query = $pdo->query("SELECT * FROM estado");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){}
											?>
										<option value="<?php echo $res[$i]['id']?>"> <?php echo $res[$i]['nome'] ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-6">						
							<div class="form-group mb-3"> 
								<label>País de Origem</label> 
								<select class="form-control" name="nacional" id="nacional" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<?php
									$query = $pdo->query("SELECT * FROM paises");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){}
											?>
										<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['nome'] ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>

						

					</div>

					<div class="row">

						<div class="col-md-4 col-4">						
							<div class="form-group mb-3"> 
								<label>Escolaridade</label> 
								<select class="form-control" name="escolaridade" id="escolaridade" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<option value="Maternal">Maternal</option>
									<option value="Fundamental">Fundamental</option>
									<option value="Médio">Médio</option>
									<option value="Superior">Superior</option>
								</select>
							</div>
						</div>

						<div class="col-md-4 col-4">						
							<div class="form-group mb-3"> 
								<label>Ensino</label> 
								<select class="form-control" name="ensino" id="ensino" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<option value="Completo">Completo</option>
									<option value="Incompleto">Incompleto</option>
									<option value="Cursando">Cursando</option>
								</select>
							</div>
						</div>

						<div class="col-md-4 col-4">						
							<div class="form-group mb-3"> 
								<label>PCD</label> 
								<select class="form-control" name="pcd" id="pcd" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<option value="Não possui">Não possui</option>
									<option value="Cegueira">Autista</option>
									<option value="Cegueira">Cegueira</option>
									<option value="Baixa visão">Baixa visão</option>
									<option value="Surdez severa">Surdez severa</option>
									<option value="Surdez leve">Surdez leve</option>
									<option value="Deficiência física">Deficiência física</option>
									<option value="Deficiência mental">Deficiência mental</option>
									<option value="Síndrome de down">Síndrome de down</option>
									<option value="Transtorno ou doença mental">Transtorno mental</option>
								</select>
							</div>
						</div>

					</div>


					<div class="row">
						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Doc Identificação</label>
								<select class="form-control" name="tipodoc" id="tipodoc" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<option value="Registro Geral">RG</option>
									<option value="Registro Administrativo de Nascimento de Indígena">RANI</option>
									<option value="Registro Nacional Migratório">RNM</option>
									<option value="Registro Nacional do Estrangeiro">RNE</option>
									<option value="Não possue">Não possue</option>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Número documento</label>
								<input name="docnum" type="text" class="form-control" placeholder="Digite o Nr do documento">
							</div>
						</div>

						<div class="col-md-3 col-6">						
							<div class="form-group mb-3"> 
								<label for="exampleFormControlInput1" class="form-label">Órgão Emissor</label> 
								<select class="form-control" name="docorgao" id="docorgao" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<?php
									$query = $pdo->query("SELECT * FROM orgaoemissor");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value){}
											?>
										<option value="<?php echo $res[$i]['id'] ?>"> <?php echo $res[$i]['sigla'] ?> </option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Data Emissão</label>
								<input name="docexpedicao" id="docexpedicao" type="date" class="form-control">
							</div>
						</div>


					</div>




					<div class="row">
						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Carteira Reservista</label>
								<input name="reservista" type="text" class="form-control" placeholder="Se Houver">
							</div>
						</div>

						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Carteira de Trabalho</label>
								<input name="clt" type="text" class="form-control" placeholder="Se Houver">
							</div>
						</div>

						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Cartão do SUS</label>
								<input name="cartaosus" type="text" class="form-control" placeholder="Se Houver">
							</div>
						</div>

						<div class="col-md-3 col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Cartão de Vacina</label>
								<input name="cartaovacina" type="text" class="form-control" placeholder="Se Houver">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-3">
							<div class="form-group mb-3">
								<label for="exampleFormControlInput1" class="form-label">Email</label>
								<input name="email" id="email" type="email" class="form-control">
							</div>
						</div>

						<div class="col-md-3 col-5">						
							<div class="form-group mb-3"> 
								<label for="exampleFormControlInput1" class="form-label">Rede Social</label> 
								<select class="form-control" name="redesocial" id="redesocial" required>
									<option value="" selected disabled hidden>clique aqui</option>
									<option value="Não possui">Não possuo</option>
									<option value="Facebook">Facebook</option>
									<option value="Instagram">Instagram</option>
									<option value="Linkdin">Linkdin</option>
								</select>
							</div>
						</div>

						<div class="col-md-3 col-7">
							<div class="form-group mb-3">
								<label for="exampleFormControlInput1" class="form-label">Descrição Rede Social</label>
								<input name="descricaoredesocial" id="descricaoredesocial" type="text" class="form-control">
							</div>
						</div>

						<div class="col-md-3 col-5">
							<div class="form-group mb-3">
								<label for="exampleFormControlInput1" class="form-label">Telefone</label>
								<input name="telefone" id="telefone" type="text" class="form-control">
							</div>
						</div>

					</div>

					<input type="hidden" name="id" id="id" value="<?php echo $id ?>">

								

				</div>


				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>

				<small><div id="mensagem-dependente" align="center"></div></small>								

			</form>

		</div>
	</div>
</div>

<br>
	<br>

 		
	<div class="position-relative px-2" align="center">
		<div class=" d-inline">
			<a href="./conjugue.php">
			<button class="btn btn-primary" type="button">anterior</button>
			</a>
		</div>


		<div class="d-inline">
			<a href="./finalizar.php">
			<button class="btn btn-primary" type="submit">Finalizar</button>
			</a>
		</div>
	</div>





<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Excluir Registro</h5>
				<button id="btn-fechar-excluir" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir">
				<div class="modal-body">

					<p>Deseja realmente excluir o registro: <span id="titulo-excluir"></span></p>

					<input type="hidden" name="id" id="id-excluir">
					<small><div id="mensagem-excluir" align="center"></div></small>

				</div>
				<div class="modal-footer">        
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">var pag = "<?=$pag?>"</script>
<script src="js/ajax.js"></script>




<script type="text/javascript">
$("#form-dependente").submit(function () {
	$('#mensagem-dependente').text('...Carregando!')

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "dependentes/salvar.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem-dependente').text('');
            $('#mensagem-dependente').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {                        
            	//location.reload();
            	$('#mensagem-dependente').addClass('text-success')
            	$('#mensagem-dependente').text(mensagem)
            	window.location='dependentes.php';
            } else {
                $('#mensagem-dependente').addClass('text-danger')
                $('#mensagem-dependente').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});

</script>


<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>