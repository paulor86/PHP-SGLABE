<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//carega o menu das views de acesso
	$this->load->view('acesso/header');
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-10 col-xs-offset-1 formLogin col-md-offset-4">
				<form class="form-group" method="post" action="<?php echo base_url('/Acesso/login');?>">
				
						<div class="text-center"><h3>Acesso ao sistema</h3></div><br>
						<?php if(isset($alertas)){echo $alertas;}?>
						<div class="input-group input-group-lg">
							<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" name="matricula"  required="" class="form-control input-lg" placeholder="Matrícula">
						</div><br>
						<div class="input-group input-group-lg">
							<span class="input-group-addon "><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password"  required="" name="password" class="form-control input-lg" placeholder="Senha">
						</div><br>
					
					<button type="submit" class="btn btn-primary  input-lg" name="btnlogin"><span class="glyphicon glyphicon-ok"></span> Entrar</button>
					
					<div class="input-group pull-right">
							<input type="checkbox" name="remember"> <span  class="font15px"> Continuar logado</span>
					</div><br>
				</form>
				<div class="col-md-12 font15px text-center">
					<a href="<?php echo base_url('/Acesso/requestPassword');?>">Esqueci minha senha</a>
				</div>
			</div>
		</div>
	</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>