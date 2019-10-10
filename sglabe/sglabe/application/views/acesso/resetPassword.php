<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//carega o menu das views de acesso
	$this->load->view('acesso/header');
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-10 col-xs-offset-1 formLogin col-md-offset-4">
				<form class="form-group" method="post" action="<?php echo base_url("/Acesso/resetPassword/$hash");?>">
				
						<div class="text-center"><h3><?php echo $pageTitle;?></h3></div><br>
						<?php if(isset($alertas)){echo $alertas;}?>
						<div class="input-group input-group-lg">
							<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" name="matricula"  required="" readonly="" value="<?php echo $dataUser->fk_matricula;?>" class="form-control input-lg" placeholder="Matrícula">
						</div><br>
						
							<input type="password"  required="" name="password" class="form-control input-lg" placeholder="Nova senha"><br>
							<input type="password"  required="" name="confirm" class="form-control input-lg" placeholder="Confirme sua senha"><br>
					
					<button type="submit" class="btn btn-primary  input-lg" name="btnlogin"><span class="glyphicon glyphicon-refresh"></span> Restaurar</button><br>
				</form>
				<div class="col-md-12 font15px text-center">
					<a href="<?php echo base_url('/Acesso');?>">Voltar ao inicio</a>
				</div>
			</div>
		</div>
	</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>