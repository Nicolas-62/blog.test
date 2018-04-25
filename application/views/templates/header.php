<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= css_url('blog') ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title><?= $title ?></title>
</head>
<body>
	<header>
		 <nav class="navbar fixed-top bg-light" id="nav">
		 	<?php
			if (isset($_SESSION['pseudo'])){ 
			?>

			<div class="col-lg-3">					
				<a class="btn btn-danger mr-3" href="<?php echo site_url('user/logout'); ?>" role="button">Déconnexion</a>
				<em>Bienvenue <?= $_SESSION['pseudo'] ?></em>
			</div>

			<?php 
			}else { 
			?>

			<div class="col-lg-3">
				<a class="btn btn-primary" href="<?php echo site_url('user/signup'); ?>" role="button">Connexion</a>
			</div>

			<?php
			} 
			?>

			<div class="col-lg-offset-2 col-lg-3 ">
				<div id="titre_blog">Le Blog de Nico</div>
			</div>
			<div class="col-lg-offset-2 col-lg-2 ">
				<div id="lien_accueil"><a href="<?php echo site_url(''); ?>">Retour à l'accueil</a></div>
		 </nav>
	</header>
	<div class="container p-3">

