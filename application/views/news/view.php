<div class="card rounded">
	<div class="card-body ">
		<h2><?= $news_item['comment'] ?></h2>
			<em>par <?= $news_item['author'] ?>, le <?= french_date($news_item['date']) ?></em>
			<br>
			<p><a href="<?php echo site_url('news'); ?>">Retour à la liste des articles</a></p>
	</div>
</div>