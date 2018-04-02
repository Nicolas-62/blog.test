<div class="cotainer-fluid">
	<?= validation_errors() ?>
	<?= form_open('news/create') ?>
		<fieldset>
			<legend><?= $title ?></legend>
				<div class="form-group">
				    <label for="title">Titre :</label>
				    <input class="form-control" type="input" name="title" id="title" />
				    <br>
				</div>
				<div class="form-group">
					<label for="comment">Commentaire :</label><br>
					<textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
				</div> 
			    <input type="hidden" name="author" value="<?= $_SESSION['pseudo'] ?>" />
			    <br>
			    <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
		</fieldset>
	</form>
	<div class="m-3">
		<a href="<?php echo site_url('news'); ?>">Retour à la liste des articles</a>
	</div>
</div>