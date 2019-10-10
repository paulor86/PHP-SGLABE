<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<table class="table table-bordered">
	<tr>
		<th class="text-right">Nome</th><td><?php echo "{$dataAluno->nome} {$dataAluno->sobrenome}";?></td>
	</tr>
	<tr>
		<th class="text-right">Matrícula</th><td><?php echo $dataAluno->matricula;?></td>
	</tr>
	<tr>
		<th class="text-right">E-mail</th><td><?php echo $dataAluno->email;?></td>
	</tr>
	<tr>
		<th class="text-right">Perfil</th><td>Aluno</td>
	</tr>
	<tr>
		<th class="text-right">Status</th><td><?php echo $dataAluno->status_conta;?></td>
	</tr>
	<tr>
		<th class="text-right">CPF</th><td><?php echo $dataAluno->cpf;?></td>
	</tr>
	<tr>
		<th class="text-right">Telefone</th><td><?php echo $dataAluno->telefone;?></td>
	</tr>
</table>