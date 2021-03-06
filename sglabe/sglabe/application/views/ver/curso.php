<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//carega o menu das views de acesso
	$this->load->view('header');
?>
<!--
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
					<div class="col-md-9">
						<table class="table">
							
							<thead>
								<tr>

									<th>Código do Curso</th>
									<th>Nome do Curso</th>									
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php

								if($dataCurso){ 
									foreach ($dataCurso as $key) {
										echo "
											<tr>
												<td>{$key->codigo_curso}</td>
												<td>{$key->descricao}</td>										
												<td><a href=\"".base_url('/Editar/curso/'.$key->codigo_curso)."\" title=\"Editar\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
												</td>
											</tr>
										";
									}
								}
								?>
							</tbody>
						</table>
					</div>
				<div class="col-md-3">
					    <div class="list-group" id="list-tab" role="tablist">					      
					      <a title="Cadastrar Curso" class="list-group-item text-center list-group-item-action active" id="list-profile-list" data-toggle="list" href="<?php echo base_url('/Cadastros/curso');?>" role="tab" aria-controls="profile"><span class="glyphicon glyphicon-plus"></span>  Cursos</a>     
					    </div>
  				</div>
				<br>				
			</div>			
		</div>
	</div>
	


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>