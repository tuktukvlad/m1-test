
<div class="row justify-content-center">
	<div class="col-lg-5">
		<div class="p-4 bg-white shadow">
			<img class="img-fluid rounded mb-2" src="<?= $model->image  ?>" alt="">
			<a class="btn btn-primary" href="/audio/update/<?= $model->id?>">Редактировать</a>
			<a class="btn btn-danger" href="/audio/delete/<?= $model->id?>">Удалить</a>
			<h4 class="mt-3 mb-0"><?= $model->artist ?></h4>
			<h1 class="mb-3"><?= $model->name ?></h1>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Год: <span class="font-weight-bold"><?= $model->year  ?></span></li>
				<li class="list-group-item">Длительность: <span class="font-weight-bold"><?= $model->duration  ?></span></li>
				<li class="list-group-item">Стоимость: <span class="font-weight-bold"><?= $model->cost  ?> $</span></li>
				<li class="list-group-item">Дата покупки: <span class="font-weight-bold"><?= $model->purchase_date  ?></span></li>
				<li class="list-group-item">Место хранения: <?= $model->storage  ?> </li>
			</ul>
		</div>
	</div>
</div>