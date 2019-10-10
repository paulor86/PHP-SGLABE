<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//carega o menu das views de acesso
	$this->load->view('header');
?>
<div class="container-fluid login-main">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-7 logomarca"><span class="glyphicon glyphicon-paperclip"></span> SGLABE</div>
			<div class="col-md-3 col-xs-2   menu-login"><a href="#" class="about"><span class="glyphicon glyphicon-home"></span>Home</a></div>
			<div class="col-md-2 col-xs-2   menu-login"><a href="#" class="about"><span class="glyphicon glyphicon-info-sign"></span>Sobre</a></div>			
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container conteudo">
		<div class="row">
			<div class="col-md-5 login-area">
			
				<h1 class="login_msg_acesso">Solicitar Insumos</h1><br>
				<?php if(isset($alertas)){echo $alertas;}?>
				<div class="btn-group btn-group-vertical" role="group">
				    <div  class="btn-group" role="group"> 
				    <button type="button" class="btn btn-primary input-lg"><span class="glyphicon glyphicon-floppy-disk"></span> Solicitar Software</button>
				</div></br>
				<div class="btn-group btn-group-vertical" role="group">
				    <div  class="btn-group" role="group"> 
				    <button type="button" class="btn btn-primary input-lg"><span class="glyphicon glyphicon-wrench"></span> Solicitar Reparo de Máquina</button>    
				</div></br>					
			</div>			
		</div>
	</div>
</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>