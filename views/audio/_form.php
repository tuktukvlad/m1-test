<form method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-12 mb-3">
    	<label for="name">Название альбома</label>
      <input type="text" class="form-control" name="name" value="<?= $model->name ? :null?>" placeholder="Название альбома" maxlength="255" required>
      <div class="invalid-feedback">
        Нужно заполнить
      </div>
    </div>
    <div class="col-12 mb-3">
    	<label for="artist">Исполнитель</label>
      <input type="text" class="form-control" name="artist" value="<?= $model->artist ? :null?>" placeholder="Исполнитель" maxlength="255" required>
      <div class="invalid-feedback">
        Нужно заполнить
      </div>
    </div>
    <div class="col-md-4 mb-3">
    	<label for="year">Год выпуска</label>
      <input type="number" class="form-control" id="year" name="year" value="<?= $model->year ? :null?>" placeholder="Год выпуска" max="2019" maxlength="4" required>
      <div class="invalid-feedback">
        Ошибка
      </div>
    </div>
    <div class="col-md-4 mb-3">
    	<label for="duration">Длительность</label>
      <input type="time" class="form-control" id="duration" name="duration" value="<?= $model->duration ? :null?>" required>
      <div class="invalid-feedback">
        Ошибка
      </div>
    </div>
    <div class="col-md-4 mb-3">
    	<label for="cost">Стоимость</label>
        <input type="number" class="form-control" id="cost" step="0.01" name="cost" value="<?= $model->cost ? :null?>" placeholder="Стоимость" required>
        <div class="invalid-feedback">
        Нужно заполнить
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
    	<label for="purchase_date">Дата покупки</label>
      <input type="date" class="form-control" id="purchase_date" max="2019-12-31" value="<?= $model->purchase_date ? :null?>" name="purchase_date" required>
      <div class="invalid-feedback">
        Нужно заполнить
      </div>
    </div>
    <div class="col-md-6 mb-3">
    	<label for="image">Обложка</label>
      <input type="file" class="form-control" id="image" name="image">
      <div class="invalid-feedback">
        Нужно заполнить
      </div>
    </div>
  </div>
  <button class="btn btn-success" type="submit">Сохранить</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>