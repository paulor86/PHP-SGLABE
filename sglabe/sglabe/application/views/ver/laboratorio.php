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

									<th>Código do Laboratório</th>
									<?php 
										if($this->Banco->getDataSession('area')=='informatica'){
											echo "<th>Número de Máquinas</th>";
										}
									?>	
									<th>Descrição</th>						
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if($dataLaboratorio){
									foreach ($dataLaboratorio as $key) {
										echo "
											<tr>
												<td>{$key->codigo_lab}</td>";
												
										if($this->Banco->getDataSession('area')=='informatica'){
											echo "<td>{$key->num_maquinas}</td>";
										}
										echo"<td>{$key->descricao}</td>
											<td>	
												<a href=\"".base_url('/Editar/laboratorio/'.$key->codigo_lab)."\" title=\"Editar\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
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
					      <a title="Cadastrar Laboratório" class="list-group-item text-center list-group-item-action active" id="list-profile-list" data-toggle="list" href="<?php echo base_url('/Cadastros/laboratorio');?>" role="tab" aria-controls="profile"><span class="glyphicon glyphicon-plus"></span>  Laboratórios</a>     
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