<h3><?= $title ?></h3>
	<p><a href="<?php echo site_url('news', 'create'); ?>">Ajoutez un article si vous êtes connecté !</a></p>
<?php 
echo $this->pagination->create_links();
foreach ($news as $news_item): 
?>
	<div class="card mb-4">
		<div class="card-header">
			<h5><?= ucfirst($news_item['title']) ?></h5><em> par <?= $news_item['author'] ?></em>
		</div>
		<div class="card-body">
			<div class="row m-1">
				<?= ucfirst($news_item['comment']) ?>
			</div>
			<div class="row m-1">
				<em>le <?=  french_date($news_item['date']) ?></em>
			</div>
			<div class="row m-1">
				<?= url('Détail d\'un article', 'news/'.$news_item['label']) ?>
				<div class="col">					
				</div>
				<?php
				if (!empty($_SESSION['pseudo']) && $_SESSION['pseudo'] == $news_item['author']):
					echo url('Supprimez votre article', 'news/delete/'.$news_item['label']); 
				endif;
				?>
			</div>
		</div>
	</div>
<?php endforeach; 
echo $this->pagination->create_links(); 
?>

