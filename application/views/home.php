<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenue</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet"> 
</head>
<body>
<div class="row mt-3">
	<div class="col-lg-12">
		<h1 id="titre_accueil" class="text-center">Bienvenue sur mon site</h1>
	</div>
</div>
<div  id ="corps" class="container-fluid">
	<div class="row mt-4">
		<div class="col-lg-4">
			<div class="card mb-5">
				<div class="card-header">
					Mon projet de Formation
				</div>
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="https://www.locationsvoiture.fr"></iframe>
					</div> 
				<div class="card-footer">
					<a href="https://www.locationsvoiture.fr" target="_blank">Voir sur : locationsvoiture.fr</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card mb-5">
				<div class="card-header">
					Mon projet avec <a href="https://www.codeigniter.com/" >CodeIgniter</a>
				</div>
				<div class="embed-responsive embed-responsive-4by3">
					<iframe class="embed-responsive-item" src="/news"></iframe>
				</div> 
				<div class="card-footer">
					<a href="/news">Voir</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card mb-5">
				<div class="card-header">
					Mon CV 
				</div>
				<div class="embed-responsive embed-responsive-4by3">
					<iframe class="embed-responsive-item" src="/cv"></iframe>
				</div>
				<div class="card-footer">
					<a href="/cv">Voir</a>
				</div> 
			</div>
		</div>
	</div>
</div>
  <script src="./assets/javascript/home.js"></script>  
</body>
</html>