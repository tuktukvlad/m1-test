


<h1><?= $model->name ?></h1>
<h3><?= $model->artist ?></h3>
<img src="<?= $model->image  ?>" alt="">
<ul>
	<li>Год: <?= $model->year  ?> </li>
	<li>Длительность: <?= $model->duration  ?> </li>
	<li>Стоимость: <?= $model->cost  ?> $ </li>
	<li>Дата покупки: <?= $model->purchase_date  ?> </li>
	<li>Место хранения: <?= $model->storage  ?> </li>
</ul>