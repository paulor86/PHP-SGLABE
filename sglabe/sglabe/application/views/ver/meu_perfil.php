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
			
						<table class="table table-bordered">
							<tr>
								<th class="text-right">Nome</th><td><?php echo "{$data->nome} {$data->sobrenome}";?></td>
							</tr>
							<tr>
								<th class="text-right">Matrícula</th><td><?php echo $data->matricula;?></td>
							</tr>
							<tr>
								<th class="text-right">E-mail</th><td><?php echo $data->email;?></td>
							</tr>
							<tr>
								<th class="text-right">Perfil</th><td><?php echo $data->perfil;?></td>
							</tr>
							<tr>
								<th class="text-right">Status</th><td><?php echo $data->status_conta;?></td>
							</tr>
							<tr>
								<th class="text-right">CPF</th><td><?php echo $data->cpf;?></td>
							</tr>
							<tr>
								<th class="text-right">Telefone</th><td><?php echo $data->telefone;?></td>
							</tr>
						</table>
					
				
							
			</div>			
		</div>
	</div>
	


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>



