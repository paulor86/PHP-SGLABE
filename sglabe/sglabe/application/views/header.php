<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Sglabe<?php if(isset($pageTitle)){ echo " - $pageTitle";}?></title>
	<link rel="stylesheet" href="<?php echo base_url('/resources/css/bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('/resources/css/style.css');?>">
	<link rel="shortcut icon"  href="<?php echo base_url('/resources/img/favicon.ico');?>">
	<script type="text/javascript" src="<?php echo base_url('/resources/js/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/resources/js/bootstrap.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/resources/js/functions.js');?>"></script>
</head>
<body class="conteudo">

		<!-- MENU MOBILE -->
		<div class="container">
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuPrincipal" aria-expanded="false" aria-controls="navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" id="logomarca" href="<?php echo base_url();?>">
							<span class="glyphicon glyphicon-paperclip"></span> SGLABE
					</a>
				</div>
		</nav>
		</div>

		<!--
			
			Autores: Daniel de Sá, Frank Carrilho, Paulo Roberto, Douglas Rocha
			Versão:1.0 BETA
			Manaus, 2018
		-->