<div class="container p-2" style="margin: 10px;">
	<h4>Vous êtes connecté !</h4>
	<h3><?= $_SESSION['message'] ?></h3>
	<br>
	<p><a href="<?php echo site_url('news'); ?>">Retour à la liste des articles</a></p>
</div>