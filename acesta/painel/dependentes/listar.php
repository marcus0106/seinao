<?php 
require_once("../../conexao.php");
@session_start();
$id_beneficiario = $_SESSION['id_beneficiario'];

$tabela = 'dependentes';

$query = $pdo->query("SELECT * FROM $tabela where idben = $id_beneficiario order by nome desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Dependentes</th>	
	<th class="esc">Sexo</th>
	<th class="esc">Parentesco</th>
	<th class="esc">CPF</th>			
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
		$id = $res[$i]['id'];
		$idben = $res[$i]['idben'];		
		$nome = $res[$i]['nome'];		
		$sexo = $res[$i]['sexo'];
		$racacor = $res[$i]['racacor'];
		$etnia = $res[$i]['etnia'];
		$cpf = $res[$i]['cpf'];
		$tipodoc = $res[$i]['tipodoc'];
		$docnum = $res[$i]['docnum'];
		$docorgao = $res[$i]['docorgao'];
		$docexpedicao = $res[$i]['docexpedicao'];
		$pcd = $res[$i]['pcd'];
		$parentesco = $res[$i]['parentesco'];
		$natura = $res[$i]['natura'];
		$nacional = $res[$i]['nacional'];
		$religiao = $res[$i]['religiao'];
		$escolaridade = $res[$i]['escolaridade'];
		$ensino = $res[$i]['ensino'];
		$datanasc = $res[$i]['datanasc'];
		$reservista = $res[$i]['reservista'];
		$clt = $res[$i]['clt'];
		$cartaosus = $res[$i]['cartaosus'];
		$cartaovacina = $res[$i]['cartaovacina'];
		$telefone = $res[$i]['telefone'];
		
		$email = $res[$i]['email'];
		$redesocial = $res[$i]['redesocial'];
		$descricaoredesocial = $res[$i]['descricaoredesocial'];
	
		//$descricaoF = mb_strimwidth($descricao, 0, 80, "...");	

		
echo <<<HTML
<tr>
<td>{$nome}</td>
<td class="esc">{$sexo}</td>
<td class="esc">{$parentesco}</td>
<td class="esc">{$cpf}</td>

<td>
	<big><a href="#" onclick="editar('{$id}','{$idben}', '{$nome}', '{$sexo}', '{$racacor}', '{$etnia}', '{$cpf}', '{$tipodoc}', '{$docnum}', '{$docorgao}', '{$docexpedicao}', '{$pcd}', '{$parentesco}', '{$natura}', '{$nacional}', '{$religiao}', '{$escolaridade}', '{$ensino}', '{$datanasc}', '{$reservista}', '{$clt}', '{$cartaosus}', '{$cartaovacina}', '{$telefone}', '{$email}', '{$redesocial}', '{$descricaoredesocial}')" title="Editar Dados"><i class="far fa-edit"></i></a></big>

	<big><a href="#" onclick="excluir('{$id}','{$nome}')" title="Excluir Registro"><i class="far fa-trash-alt"></i></a></big>



</td>
</tr>
HTML;

}

echo <<<HTML
	</tbody>
	<small><div align="center" id="mensagem-excluir"></div></small>
	</table>
	</small>
HTML;


}else{
	echo 'Não possui Dependentes cadastrados!';
}


 ?>


<script type="text/javascript">
	$(document).ready( function () {
    $('#tabela').DataTable({
    	"destroy": true,
    	"ordering": false,
		"stateSave": true
    	});
    $('#tabela_filter label input').focus();
} );
</script>


<script type="text/javascript">
	function editar(id, idben, nome, sexo, racacor, etnia, cpf, tipodoc, docnum, docorgao, docexpedicao, pcd, parentesco, natura, nacional, religiao, escolaridade , ensino, datanasc, reservista, clt, cartaosus, cartaovacina, telefone, email, redesocial, descricaoredesocial){
		$('#id').val(id);
		$('#idben').val(idben);
		//nicEditors.findEditor("area").setContent(descricao);
		$('#nome').val(nome);	
		$('#sexo').val(sexo).change();
		$('#racacor').val(racacor).change();
		$('#etnia').val(etnia).change();
		$('#cpf').val(cpf);	
		$('#tipodoc').val(tipodoc).change();
		$('#docnum').val(docnum);	
		$('#docorgao').val(docorgao).change();
		$('#docexpedicao').val(docexpedicao);
		$('#pcd').val(pcd).change();
		$('#parentesco').val(parentesco).change();
		$('#natura').val(natura).change();
		$('#nacional').val(nacional).change();
		$('#religiao').val(religiao).change();
		$('#escolaridade').val(escolaridade).change();
		$('#ensino').val(ensino).change();
		$('#datanasc').val(datanasc).change();
		$('#reservista').val(reservista);
		$('#clt').val(clt);
		$('#cartaosus').val(cartaosus);
		$('#cartaovacina').val(cartaovacina);
		$('#telefone').val(telefone);
		$('#email').val(email);
		$('#redesocial').val(redesocial).change();
		$('#descricaoredesocial').val(descricaoredesocial);
		
		$('#titulo_inserir').text('Editar Registro');
		$('#modalForm').modal('show');
		
	}

		function excluir(id, titulo){
		$('#id-excluir').val(id);
		$('#titulo-excluir').text(titulo);				
		
		$('#modalExcluir').modal('show');		
	}



	function limparCampos(){
		$('#id').val('');
		$('#idben').val('');
		$('#nome').val('');
		$('#sexo').val('');
		$('#racacor').val('');
		$('#etnia').val('');
		$('#cpf').val('');
		$('#tipodoc').val('');
		$('#docnum').val('');
		$('#docorgao').val('');
		$('#docexpedicao').val('');
		$('#pcd').val('');
		$('#parentesco').val('');
		$('#natura').val('');
		$('#nacional').val('');
		$('#religiao').val('');
		$('#escolaridade').val('');
		$('#ensino').val('');
		$('#datanasc').val('');
		$('#reservista').val('');
		$('#clt').val('');
		$('#cartaosus').val('');
		$('#cartaovacina').val('');
		$('#telefone').val('');
		$('#email').val('');
		$('#redesocial').val('');
		$('#descricaoredesocial').val('');

		//nicEditors.findEditor("area").setContent('');
		//$('#video').val('');
		//$('#exibir').val('Imagem').change();		
		//$('#titulo').val('');		
		//$('#foto').val('');
		//$('#target').attr('src','../img/servicos/sem-foto.jpg');
	}

</script>