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
						<form method="post" action="<?php echo base_url('/Solicitacoes/rep_maquina');?>" class="form-group">							
							<textarea name="descricao" required="" class="form-control input-lg" placeholder="Descrição do Reparo"></textarea><br>
							<select onchange="listaMaquinasLaboratorio('<?php echo base_url("/Visualizar/listaMaquina");?>')" id="laboratorio" name="codigo_laboratorio" required="" class="form-control  input-lg">
										<option selected="" value="">Selecione o Laboratório</option>
											
										<?php 
											if($dataLaboratorio){

												foreach ($dataLaboratorio as $key) {
													echo "<option value=\"{$key->codigo_lab}\">{$key->codigo_lab}</option>";
												}
											}
											
										?>
									</select>
								<br>
							<div id="listaLaboratorios" class="col-md-12 no-padding">
							</div>						
						<br>
							<button type="submit" class="btn btn-primary" title="Adicionar máquina" name="btnlogin"><span class="glyphicon glyphicon-ok"> </span> Solicitar</button>		
						</form>
					</div>
					<div class="col-md-4">
					    <div class="list-group" id="list-tab" role="tablist">
					      <a class="list-group-item list-group-item-action text-center active" id="list-home-list" data-toggle="list" href="<?php echo base_url('/Visualizar/solicitar_rep_maquina');?>" role="tab" aria-controls="home"><span class="glyphicon glyphicon-th-list"></span> Listar</a>					      
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