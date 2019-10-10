<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//carega o menu das views de acesso
	$this->load->view('header');
?>
<!--
	MENU LATERAL(SIDEBAR)
-->
<div class="container-fluid">
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
						<form method="post" action="<?php echo base_url('/Cadastros/laboratorio');?>" class="form-group">						
						
							<input type="text" name="codigo_laboratorio" class="form-control input-lg" placeholder="Número do laboratório">
						<br>
						<?php
							if($this->Banco->getDataSession('area') =='informatica'){
								echo"<input type=\"text\" name=\"n_maquina\" class=\"form-control input-lg\" placeholder=\"Nº de Máquinas\"><br>";
							}
						?>
							
							<input type="text" name="descricao" class="form-control input-lg" placeholder="Descrição">
						<br>					
						<button type="submit" class="btn btn-primary input-lg" name="btnlogin"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
						</form>
					</div>
					<div class="col-md-4">
					    <div class="list-group" id="list-tab" role="tablist">
					      <a class="list-group-item list-group-item-action text-center active" id="list-home-list" data-toggle="list" href="<?php echo base_url('/Visualizar/laboratorio');?>" role="tab" aria-controls="home"><span class="glyphicon glyphicon-th-list"></span> Listar</a>					      
					    </div>
  					</div>				
			</div>			
		</div>
	</div>
</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>