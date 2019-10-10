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
						<form method="post" action="<?php echo base_url("/Editar/horario/$tmpTurno/$tmpTempo");?>" class="form-group">

								<div class="col-md-4 no-padding">
									<input type="number" required="" value="<?php echo $tempo;?>" name="tempo" class="form-control input-lg" placeholder="Tempo">
								</div>
								<div class="col-md-7 col-md-offset-1 no-padding">
									<select name="turno" id="turno" onchange="getHorario()" required="" class="form-control input-lg">
										<option value="">Selecione o Turno</option>
										<option <?php  checkTurno($turno,'1');?> value="1">Matutino</option>
										<option <?php  checkTurno($turno,'2');?> value="2">Vespertino</option>
										<option <?php  checkTurno($turno,'3');?> value="3">Noturno</option>
									</select>
								</div>

								<!-- Horário de inicio --> 
								<legend>Início</legend>
								<div class="col-md-12 no-padding">
									
									<div class="col-md-3 col-xs-4 no-padding">
										<select name="inicio_hora" id="horarioInicio" required="" class="form-control  text-center input-lg">
										</select>
									</div>
									<div class="col-md-3 col-xs-4 no-padding">
										<select name="inicio_minuto" required="" class="form-control text-center input-lg">
											<?php 
												for($i=0;$i<=59;$i++){
													$aux = $i<=9 ? str_pad($i, 2, '0', STR_PAD_LEFT):$i;
													$selected = $inicio_minuto == $aux ? "selected=\"\"" : null; 
 													echo "<option $selected value=\"$aux\">$aux</option>";
												}
											?>
										</select>
									</div>
									<div class="col-md-3 col-xs-4 no-padding">
										<select name="inicio_segundo" required="" class="form-control text-center input-lg">
											<?php 
												for($i=0;$i<=59;$i++){
													$aux = $i<=9 ? str_pad($i, 2, '0', STR_PAD_LEFT):$i;
													$selected = $inicio_segundo == $aux ? "selected=\"\"" : null; 
 													echo "<option $selected value=\"$aux\">$aux</option>";
												}
											?>
										</select>
									</div>
								</div>
								
								<!-- Fim o horário -->
								<legend>Fim</legend>
								<div class="col-md-12 no-padding">
									
									<div class="col-md-3 col-xs-4 no-padding">
										<select name="fim_hora" id="horarioFim" required="" class="form-control text-center input-lg">
										</select>
									</div>
									<div class="col-md-3 col-xs-4 no-padding">
										<select name="fim_minuto" required="" class="form-control  text-center input-lg">
											<?php 
												for($i=0;$i<=59;$i++){
													$aux = $i<=9 ? str_pad($i, 2, '0', STR_PAD_LEFT):$i;
													$selected = $fim_minuto == $aux ? "selected=\"\"" : null; 
 													echo "<option $selected value=\"$aux\">$aux</option>";
												}
											?>
										</select>
									</div>
									<div class="col-md-3 col-xs-4 no-padding">
										<select name="fim_segundo" required="" class="form-control  text-center input-lg">
											<?php 

												for($i=0;$i<=59;$i++){
													$aux = $i<=9 ? str_pad($i, 2, '0', STR_PAD_LEFT):$i;
													$selected = $fim_segundo == $aux ? "selected=\"\"" : null; 
 													echo "<option $selected value=\"$aux\">$aux</option>";
												}
											?>
										</select>
									</div>
								</div>	
								<div class="col-md-12 no-padding">
									<div  class="input-group">							 
										<button type="submit" class="btn btn-primary " title="salva_horario" name="btnlogin"><span class="glyphicon glyphicon-floppy-disk"></span> Atualizar</button>
									</div>
								</div>
								
								
										
						</form>
					</div>	
				<div class="col-md-3">
					    <div class="list-group" id="list-tab" role="tablist">
					      <a class="list-group-item list-group-item-action text-center active" id="list-home-list" data-toggle="list" href="<?php echo base_url('/Visualizar/horario');?>" role="tab" aria-controls="home"><span class="glyphicon glyphicon-th-list"></span> Listar</a>       
					    </div>
  					
				</div>				
						
			</div>
		</div>
	</div>
<script type="text/javascript">
	//carrega o horario do turno

	setHorario('<?php echo $inicio_hora;?>', '<?php echo $fim_hora;?>');
</script>
<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>

