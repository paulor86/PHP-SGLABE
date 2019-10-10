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

									<th>Nome</th>
									<th>Matrícula</th>
									<th>Status</th>									
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php

								if($dataProfessor){ 
									foreach ($dataProfessor as $key) {
										echo "
											<tr>
												<td>{$key->nome} {$key->sobrenome}</td>
												<td>{$key->matricula}</td>	
												<td>{$key->status_conta}</td>										
												<td><a href=\"".base_url('/Editar/usuario/'.$key->matricula)."\" title=\"Editar\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
													<button data-toggle=\"modal\" data-target=\"#ModalDetalhes\" onclick=\"getDataUsuario('".base_url('/Visualizar/dados_usuario/'.$key->matricula)."')\" title=\"Detalhes da conta\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-eye-open\"></span></button>
												";
												if($key->status_conta === 'ativado'){
													echo "<a href=\"".base_url('/Desativar/usuario/'.$key->matricula)."\" title=\"Desativar\" class=\"btn btn-danger\"> <span class=\"glyphicon glyphicon-ban-circle\"></span> </a>";
												}else{
													echo "<a href=\"".base_url('/Ativar/usuario/'.$key->matricula)."\" title=\"Ativar\" class=\"btn btn-success\"> <span class=\"glyphicon glyphicon-ok-circle\"></span></a>";

												}
											echo	"</td>
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
					      <a title="Cadastrar Professor" class="list-group-item  list-group-item-action active" id="list-profile-list" data-toggle="list" href="<?php echo base_url('/Cadastros/usuario');?>" role="tab" aria-controls="profile"><span class="glyphicon glyphicon-plus"></span> Professor</a>  
					    <?php 
					    	//exibe as opções de gerenciamento de alunos caso o perfil do usuario seja da area de Comunicação
					    	if($this->Banco->getDataSession('area') =='comunicacao'){ 
					    ?>
					      <a title="Cadastrar Aluno" class="list-group-item  list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo base_url('/Cadastros/usuario_aluno');?>" role="tab" aria-controls="profile"><span class="glyphicon glyphicon-plus"></span> Aluno</a> 
					      <a title="Listar alunos" class="list-group-item  list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo base_url('/Visualizar/usuario_aluno');?>" role="tab" aria-controls="profile"><span class="glyphicon glyphicon-list"></span> Listar alunos</a>
					    <?php 
					 		}
					   	?>

					    </div>
  				</div>
				<br>				
			</div>			
		</div>
	</div>
	<!-- Carrega os dados do usuario -->
	<div class="modal fade" id="ModalDetalhes">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Sobre o professor</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	      <!-- Modal body -->
	      <div class="modal-body" id="getDataUsuario">
	      </div>
	    </div>
	  </div>
	</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>