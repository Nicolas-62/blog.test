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
		 <nav class="navbar navbar-expand-sm fixed-top bg-light" id="nav"> 		
		 	<?php
			if (!empty($_SESSION['pseudo'])){ 
			?>

			<div class="col-lg-4">					
				<a class="btn btn-danger mr-3" href="<?php echo site_url('user/disconnect'); ?>" role="button">Déconnexion</a>
				<em>Bienvenue <?= $_SESSION['pseudo'] ?></em>
			</div>

			<?php 
			}else { 
			?>

			<div class="col-lg-4">
				<a class="btn btn-primary" href="<?php echo site_url('user'); ?>" role="button">Connexion</a>
			</div>

			<?php
			} 
			?>

			<div class="col-lg-4">
				<div id="titre">Le Blog de Nico</div>
			</div>
		 </nav>
	</header>
	<div class="container p-3">

