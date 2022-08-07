<!DOCTYPE html>
<html>
	<head>
		<title>LaCriée</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url().'/style/style_lacriee.css'?>" />

		<header id="header">
			<div class="header-element">
				<a href="<?php echo base_url()?>"><img class="imgLogoHeader" src="<?php echo base_url().'/img/logo_lacriee.jpg';?>" title="LaCriee" alt="LogoLaCriee" /></a>
			</div>
			<div class="header-element">
				<h1 class="TitreHeader">LaCriée</h1>
			</div>
			<div class="header-element">
				<a href="<?php echo site_url('welcome/connexion_admin')?>">Admin</a>
				<a href="<?php echo site_url('welcome/connexion')?>">Compte Utilisateur</a>
			</div>
			
		</header>
	</head>

	<body>