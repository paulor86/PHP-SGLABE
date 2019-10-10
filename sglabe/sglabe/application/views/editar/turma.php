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
						<form method="post" action="<?php echo base_url("/editar/turma/$tmpCodTurma");?>" class="form-group">					
							<input type="text" required="" value="<?php echo $codigo_turma;?>" name="codigo_turma" class="form-control input-lg" placeholder="Código da Turma"><br>
						<div class="col-md-7 no-padding">
								
									<select name="fk_codigo_curso" required="" class="form-control  input-lg">
										<option  value="">Selecione o Curso</option>
											
										<?php 
											foreach ($dataCursos as $key) {
												$selected = $fk_codigo_curso == $key->codigo_curso ? "selected=\"\"":null;
												echo "<option $selected value=\"{$key->codigo_curso}\">{$key->descricao}</option>";
											}
										?>
									</select>
							
						</div>
						<div class="col-md-4 col-md-offset-1 no-padding">
							<input type="number" required="" value="<?php echo $periodo;?>" name="periodo"  class="form-control input-lg" placeholder="Período">
						</div>	
						
													
							<select name="turno" required="" class="form-control input-lg">
								<option value="">Selecione o Turno</option>
								<option <?php checkTurno($turno,'m');?> value="m">Matutino</option>
								<option <?php checkTurno($turno,'t');?> value="t">Vespertino</option>
								<option <?php checkTurno($turno,'n');?> value="n">Noturno</option>
								
							</select>	
						<br>					
						<button type="submit" class="btn btn-primary input-lg" name="btnlogin"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
						</form>								
					</div>
					<div class="col-md-4">
					    <div class="list-group" id="list-tab" role="tablist">
					      <a class="list-group-item list-group-item-action text-center active" id="list-home-list" data-toggle="list" href="<?php echo base_url('/Visualizar/turma');?>" role="tab" aria-controls="home"><span class="glyphicon glyphicon-th-list"></span> Listar</a>       
					    </div>
  					</div>			
				</div>
		</div>
</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>