
<h1>Моя аудиоколлекция</h1>

<?php foreach ($audio as $item): ?>
	<div style="float:left; border: 2px solid red; padding: 2rem">
		<h5><?= $item->artist ?></h5>
		<h2><?= $item->name ?></h2>
		<a href="/audio/<?= $item->id ?>">Подробнее</a>
	</div>
<?php endforeach ?>