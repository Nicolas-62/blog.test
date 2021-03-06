<h3><?= $title ?></h3>
	<p><a href="<?php echo site_url('news', 'create'); ?>">Ajoutez un article si vous êtes connecté !</a></p>
<?php 
// echo $this->benchmark->elapsed_time('code_start', 'code_end') . '</br>'; 
echo $this->pagination->create_links() . '</br>'; 
// var_dump($session) . '</br>'; 
foreach ($news as $news_item): 
?>
	<div class="card mb-4">
		<div class="card-header">
			<h5><?= ucfirst($news_item['title']) ?></h5><em> par <?= $news_item['author'] ?></em>
		</div>
		<div class="card-body">
			<div class="row m-1">
				<?= ucfirst(preg_replace('#https://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $news_item['comment'])); ?>
			</div>
			<div class="row m-1">
				<em>le <?=  french_date($news_item['date']) ?></em>
			</div>
			<div class="row m-1">
				<?= url('Détail d\'un article', 'news/view/'.$news_item['label']) ?>
				<div class="col">					
				</div>
				<?php
				if (!empty($_SESSION['pseudo']) && $_SESSION['pseudo'] == $news_item['author']):
					echo anchor('news/delete/'.$news_item['label'], 'Supprimez votre article'); 
				endif;
				?>
			</div>
		</div>
	</div>
<?php endforeach; 
echo $this->pagination->create_links(); 
?>

