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
						<form method="post" name="form_usuario" action="<?php echo base_url("/Editar/usuario/$tmpCodUsuario");?>" class="form-group">
							<input type="text" value="<?php echo $nome;?>" name="nome" class="form-control input-lg" placeholder="Nome"><br>
							<input type="text"  value="<?php echo $sobrenome;?>" name="sobrenome" class="form-control input-lg" placeholder="Sobrenome"><br>
							<input type="text"  value="<?php echo $matricula;?>" name="matricula" class="form-control input-lg" placeholder="Matricula"><br>
							<input type="text" maxlength="14" value="<?php echo $cpf;?>" onblur="ValidarCPF(form_usuario.cpf);" onkeypress="MascaraCPF(form_usuario.cpf);" name="cpf" class="form-control input-lg" placeholder="CPF">
						<br>
							<input type="email"  value="<?php echo $email;?>" name="email" class="form-control input-lg" placeholder="Email"><br>
							<input type="telefone"  value="<?php echo $telefone;?>" name="telefone" class="form-control input-lg" placeholder="Telefone"><br>
						<div class="input-group input-group-lg">
							<select name="perfil" required="" class="form-control">
								<option selected="" value="">Selecione o Perfil</option>
								<option value="coordenador">Coordenador</option>
								<option value="prof_responsavel">Professor Responsável</option>
								
								<?php if( $this->Banco->checkSession('area','informatica')){
									echo "<option value=\"prof_auxiliar\">Professor Auxiliar</option>";

								} ?>
							</select>
						</div><br>
						<div class="input-group input-group-lg">
							<span class="input-group-addon "><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" required="" name="senha" class="form-control input-lg" placeholder="Senha">
						</div><br>					
					<button type="submit" class="btn btn-primary input-lg" name="btnlogin"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
				</form>
			</div>
			<div class="col-md-4">
					    <div class="list-group" id="list-tab" role="tablist">
					      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="<?php echo base_url('/Visualizar/usuario');?>" role="tab" aria-controls="home"><span class="glyphicon glyphicon-th-list"></span> Listar professores</a>
					      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo base_url('/Cadastros/usuario_aluno');?>" role="tab" aria-controls="profile"><span class="glyphicon glyphicon-plus"></span> Cadastrar Aluno</a>
					    </div>
  			</div>
			<br>				
			</div>			
		</div>
	</div>
</div>


<?php
	//carrega o rodape padrao
	$this->load->view('footer');
?>