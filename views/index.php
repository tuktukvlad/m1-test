	
<h1 class="mb-5 text-center">Моя аудиоколлекция</h1>
	<div class="container">
		<div class="row">
		<div class="col-lg-9">
		<?php if ($audio): ?>
			<div class="row">
				<?php foreach ($audio as $item): ?>
					<div class="col-md-6 col-lg-4">
						<a href="/audio/<?= $item->id ?>" class=" d-block rounded bg-white p-3 shadow">
							<img class="img-fluid mb-3" src="<?= $item->image ?>" alt="">
							<h6 class="mb-0"><?= $item->artist ?></h6>
							<h2><?= $item->name ?></h2>
						</a>
					</div>
				<?php endforeach ?>
			</div>
		<?php else: ?>
			<div class="my-5 py-5 text-center">
				<h1 class="mb-5 text-muted">Не найдено</h1>
					<a class="btn btn-success btn-lg" href="">Добавить альбом</a>
			</div>
		<?php endif ?>
		</div>
		<div class="col-lg-3">
			<h4 class="mb-4">Поиск по коллекции</h4>
			<form>
				<select name="year" class="form-control mb-3" title="Выберите год">
			        <option title  selected>Выберите год</option>
			        <option value="2015">2015</option>
			        <option value="2016">2016</option>
			        <option value="2017">2017</option>
			        <option value="2018">2018</option>
			        <option value="2019">2019</option>
			      </select>
				<button type="submit" class="btn btn-primary">Найти</button>
				<a class="btn btn-light" href="/">Сбросить фильтр<a>
			</form>
		</div>
	</div>
</div>