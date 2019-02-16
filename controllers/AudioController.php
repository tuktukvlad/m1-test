<?php 
namespace app\controllers;

use App;
use app\components\Controller;
use app\components\ErrorController;
use app\models\Audio;

/**
  * 
  */
 class AudioController extends Controller
 {
 	
 	public function actionView($id)
 	{
 		$model = $this->find($id);
 		return $this->render('audio/view.php', compact('model'));
 	}

 	public function actionCreate()
 	{ 		
 		$model = new Audio();
 		if (!empty($_POST)) {
 			if ($model->load($_POST) && $model->save()) {
 				if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] == 0 ) {
 					$uploadFileInfo = pathinfo($_FILES['image']['name']);
	            	$uploadFile = $model->id . '.' . $uploadFileInfo['extension'];
	            	@mkdir(ROOT ."/public/uploads", 0777);
	            	
	            	if ($model->checkImage($_FILES['image']['type']) && move_uploaded_file($_FILES['image']['tmp_name'], ROOT . '/public/uploads/' . $uploadFile)) {
						$model->image = '/uploads/'.$uploadFile;
						$model->save();
	            	}
 				}
 				
 				$this->goto('/audio/'.$model->id);
 			}	
 		}
 		return $this->render('audio/create.php', compact('model'));
 	}

 	public function actionUpdate($id)
 	{
 		$model = $this->find($id);
 		if (!empty($_POST)) {
 			if ($model->load($_POST) && $model->save()) {


 				if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] == 0 ) {
 					$uploadFileInfo = pathinfo($_FILES['image']['name']);
	            	$uploadFile = $model->id . '.' . $uploadFileInfo['extension'];
	            	@mkdir(ROOT ."/public/uploads", 0777);
	            	
	            	if ($model->checkImage($_FILES['image']['type']) && move_uploaded_file($_FILES['image']['tmp_name'], ROOT . '/public/uploads/' . $uploadFile)) {
						$model->image = '/uploads/'.$uploadFile;
						$model->save();
	            	}
 				}
 				
				
 				$this->goto('/audio/'.$model->id);
 			}	
 		}
 		return $this->render('audio/update.php', compact('model'));
 	}

 	public function actionDelete($id)
 	{
 		$model = $this->find($id);
 		$model->delete();
 		$this->goto('/');
 		//return $this->go('audio/view.php', compact('model'));
 	}

 	public function find($id) {
 		if ($model = Audio::find_by_id($id)) {
 			return $model;
 		}
 		return (new ErrorController())->action404();
 	}

 } ?>