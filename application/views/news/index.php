<h3><?= $title ?></h3>
	<p><a href="<?php echo site_url('news', 'create'); ?>">Ajoutez un article si vous êtes connecté !</a></p>
<?php 
foreach ($news as $news_item): 
?>
	<div class="card mb-4">
		<div class="card-header">
			<h5><?= ucfirst($news_item['title']) ?></h5><em> par <?= $news_item['author'] ?></em>
		</div>
		<div class="card-body">
			<?= ucfirst($news_item['comment']) ?>
			<br><br>
			<em>le <?=  french_date($news_item['date']) ?></em>
			<br>
			<?= url('Détail d\'un article', 'news/'.$news_item['label']) ?>
			<br>
		</div>
	</div>
<?php endforeach; ?>

