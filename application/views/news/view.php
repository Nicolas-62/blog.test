<div class="card rounded">
	<div class="card-body ">
		<h5><?= ucfirst($news_item['comment']) ?></h5>
			<em>par <?= $news_item['author'] ?>, le <?= french_date($news_item['date']) ?></em>
			<br>
			<p><a href="<?php echo site_url('news'); ?>">Retour à la liste des articles</a></p>
	</div>
</div>