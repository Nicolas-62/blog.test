<div class="container p-2" style="margin: 10px;">
	<h4><?= $messages ?></h4>
	<br>
<?php 
if($form == TRUE):
?>
	<h4>Identification / Nouveau compte</h4>
	<?= validation_errors() ?>
	<?= form_open('user/connect') ?>
	<div class="form-group">
	    <label class="control-label col-sm-2" for="pseudo">Votre pseudo</label>
		<div class="col-sm-10">
			<input type="input" class="form-control" name="pseudo">
		</div>
	</div>
	<div class="form-group">
	    <label class="control-label col-sm-2" for="password">Votre mot de passe</label>
		<div class="col-sm-10">
	    	<input type="password" class="form-control" name="password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary" name="submit">Connexion</button>
		</div>
	</div>  
	</form>
<?php 
endif;
?>
	<p><a href="<?php echo site_url('news'); ?>">Retour à la liste des articles</a></p>
</div>