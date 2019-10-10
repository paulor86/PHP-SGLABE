<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Sglabe<?php if(isset($pageTitle)){ echo " - $pageTitle";}?></title>
	<link rel="stylesheet" href="<?php echo base_url('/resources/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('/resources/css/style.css');?>">
	<link rel="shortcut icon"  href="<?php echo base_url('/resources/img/favicon.ico');?>">
	<script type="text/javascript" src="<?php echo base_url('/resources/js/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/resources/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/resources/js/functions.js');?>"></script>
</head>
<body class="conteudo">
		<!-- MENU DE LOGIN -->
		<div class="container">
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuLogin" aria-expanded="false" aria-controls="navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" id="logomarca" href="<?php echo base_url();?>">
							<span class="glyphicon glyphicon-paperclip"></span> SGLABE
					</a>
				</div>
				<div id="menuLogin" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo base_url('/Acesso')?>" title="Home">
								<span class="glyphicon glyphicon-home"></span> Home
							</a>
						</li>
						<li>
							<a href="#" title="Sobre" data-toggle="modal" data-target="#aboutModal">
			  					<span class="glyphicon glyphicon-info-sign"></span> Sobre 
							</a>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			
		</nav>
		</div>

		<!--Fim do Cabeçalho -->