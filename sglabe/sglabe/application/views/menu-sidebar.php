<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid  info-user"><h4><span class="glyphicon glyphicon-user"></span> <?php echo  ucwords($this->session->userdata('nome')." ".$this->session->userdata('sobrenome'));?></h4></div>
<nav  id="menuPrincipal" class="navbar-collapse collapse">
	<div class="container-fluid">
						<ul class="nav navbar-nav">
							<li>
								<a href="<?php echo base_url('/Acesso')?>" title="Home">
									<span class="glyphicon glyphicon-home"></span> Home
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('/Acesso')?>">
									<span class="glyphicon glyphicon-plus"></span> Agendamentos
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tags"></span> Solicitações &raquo;</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url('/Solicitacoes/software')?>"><span class="glyphicon glyphicon-blackboard"></span> Software</a></li>
									<li><a href="<?php echo base_url('/Solicitacoes/rep_maquina')?>"><span class="glyphicon glyphicon-wrench"></span> Reparo de máquina</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-briefcase"></span> Gerenciamento &raquo;</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url('/Visualizar/usuario')?>"><span class="glyphicon glyphicon-user"></span> Usuários</a></li>
									<li><a href="<?php echo base_url('/Visualizar/curso')?>"><span class="glyphicon glyphicon-book"></span> Cursos</a></li>
									<li><a href="<?php echo base_url('/Visualizar/disciplina')?>"><span class="glyphicon glyphicon-blackboard"></span> Disciplinas</a></li>
									<li><a href="<?php echo base_url('/Visualizar/turma')?>"><span class="glyphicon glyphicon-education"></span> Turmas</a></li>
									<li><a href="<?php echo base_url('/Visualizar/horario')?>"><span class="glyphicon glyphicon-time"></span> Horários</a></li>
									<li><a href="<?php echo base_url('/Visualizar/laboratorio')?>"><span class="glyphicon glyphicon-th-large"></span> Laboratórios</a></li>
									<li><a href="<?php echo base_url('/Visualizar/equipamentos')?>"><span class="glyphicon glyphicon-wrench"></span> Equipamentos</a></li>
									<li><a href="<?php echo base_url('/Visualizar/maquina')?>"><span class="glyphicon glyphicon-tasks"></span> Computadores</a></li>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url('/Acesso')?>">
									<span class="glyphicon glyphicon-home"></span> Relatórios
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('/Visualizar/meu_perfil')?>">
									<span class="glyphicon glyphicon-cog"></span> Meu perfil
								</a>
							</li>
							<li>
							<a href="#" title="Sobre" data-toggle="modal" data-target="#aboutModal">
			  					<span class="glyphicon glyphicon-info-sign"></span> Sobre 
							</a>
						</li>
							<li>
								<a href="<?php echo base_url('/Acesso/logoff')?>">
									<span class="glyphicon glyphicon-off"></span> Sair
								</a>
							</li>
						</ul>
	</div>
</nav>