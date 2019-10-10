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
					<div class="col-md-7">
						<table class="table">
							
							<thead>
								<tr>
									<th>Tombo</th>
									<th>Descrição</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if($dataEquipamentos){
									foreach ($dataEquipamentos as $key) {
										echo "
											<tr>
												<td>{$key->tombo}</td>
												<td>{$key->descricao}</td>
												<td><button data-toggle=\"modal\"  onclick=\"deleteEquipamento('".base_url('/Excluir/equipamento/'.$key->tombo)."')\" data-target=\"#confirmarExclusao\" title=\"Excluir\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></button>
													<a href=\"".base_url('/Editar/equipamento/'.$key->tombo)."\" title=\"Editar\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
												</td>
											</tr>
										";
									}
								}
								?>
							</tbody>
						</table>
					</div>
				<div class="col-md-4">
					    <div class="list-group" id="list-tab" role="tablist">					      
					      <a class="list-group-item list-group-item-action active text-center" id="list-profile-list" data-toggle="list" href="<?php echo base_url('/Cadastros/equipamento');?>" role="tab" aria-controls="profile"><span class="glyphicon glyphicon-plus"></span> Cadastrar equipamento</a>     
					    </div>
  				</div>
				<br>				
			</div>			
		</div>
	</div>
	<!-- Modal Solicitacao de exclusao-->
	<div class="modal fade" id="confirmarExclusao">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">ALERTA</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	      <div class="modal-body">
	        Ao excluir esse equipamento voce pode perder dados referentes aos emprestimos do mesmo.<br>
	        Deseja excluir?
	      </div>
	      <div class="modal-footer">
	     		<a  href="#" class="btn btn-danger" id="btnDelete"><span class="glyphicon glyphicon-trash"></span> Excluir</a>
	      </div>

	    </div>
	  </div>
	</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>