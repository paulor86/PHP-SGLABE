<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//carega o menu das views de acesso
	$this->load->view('header');
?>

<!---
	MENU LATERAL(SIDEBAR)
-->

	<div class="container conteudo">
		<div class="row">
			<div class="col-md-3 menuPrincipal">
				<?php $this->load->view("menu-sidebar");?>
			</div>

<!--
	FIM DO MENU LATERAL(SIDEBAR)
-->
       
    <div class="col-md-8 col-md-offset-1 col-xs-12 principal">
	 	<?php if(isset($alertas)){echo $alertas;}?>
			<div class="col-md-12"><h3 class="localTitle"><?php echo $pageTitle;?></h3></div>
				<div class="col-md-7">
					<form method="post" action="<?php echo base_url("/Editar/disciplina/$tmpCodDisciplina");?>" class="form-group">
						<div class="col-md-7 no-padding" >
							<textarea name="descricao_disciplina" required="" class="form-control input-lg" placeholder="Descrição da disciplina"><?php echo $descricao_disciplina;?></textarea>		
						</div>
						<div class="col-md-4 col-md-offset-1 no-padding" >
							<input type="text" value="<?php echo $codigo_disciplina;?>" name="codigo_disciplina" required="" class="form-control input-lg"  maxlength="8" placeholder="Código"><br>
						</div>
						
						<div class="col-md-12 no-padding" >
						<button type="submit" class="btn btn-primary input-lg" name="btnlogin"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
						</div>
					</form>								
				</div>
				<div class="col-md-4">
				    <div class="list-group" id="list-tab" role="tablist">
				      <a class="list-group-item list-group-item-action active text-center" id="list-home-list" data-toggle="list" href="<?php echo base_url('/Visualizar/disciplina');?>" role="tab" aria-controls="home"><span class="glyphicon glyphicon-th-list"></span> Listar</a>     
				    </div>
				</div>			
			</div>
		</div>
</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>