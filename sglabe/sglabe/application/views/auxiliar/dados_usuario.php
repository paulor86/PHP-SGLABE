<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<table class="table table-bordered">
	<tr>
		<th class="text-right">Nome</th><td><?php echo "{$dataProfessor->nome} {$dataProfessor->sobrenome}";?></td>
	</tr>
	<tr>
		<th class="text-right">Matrícula</th><td><?php echo $dataProfessor->matricula;?></td>
	</tr>
	<tr>
		<th class="text-right">E-mail</th><td><?php echo $dataProfessor->email;?></td>
	</tr>
	<tr>
		<th class="text-right">Perfil</th><td><?php echo $dataProfessor->perfil;?></td>
	</tr>
	<tr>
		<th class="text-right">Status</th><td><?php echo $dataProfessor->status_conta;?></td>
	</tr>
	<tr>
		<th class="text-right">CPF</th><td><?php echo $dataProfessor->cpf;?></td>
	</tr>
	<tr>
		<th class="text-right">Telefone</th><td><?php echo $dataProfessor->telefone;?></td>
	</tr>
</table>