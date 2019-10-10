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
						<form method="post" action="<?php echo base_url('/Cadastros/curso');?>" class="form-group">				
							<input type="text" required="" name="codigo_curso" class="form-control input-lg" placeholder="Código do Curso">
						<br>
						
							<input type="text" required="" name="nome_curso" class="form-control input-lg" placeholder="Nome do Curso"><br>					
						<button type="submit" class="btn btn-primary input-lg" name="btnlogin"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
						</form>
					</div>
					<div class="col-md-4">
					    <div class="list-group" id="list-tab" role="tablist">
					      <a class="list-group-item list-group-item-action active text-center" id="list-home-list" data-toggle="list" href="<?php echo base_url('/Visualizar/curso');?>" role="tab" aria-controls="home"><span class="glyphicon glyphicon-th-list"></span> Listar</a>       
					    </div>
  					</div>				
				</div>			
		</div>
</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>