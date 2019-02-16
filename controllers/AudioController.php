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
 		$model = $this->find($id);
 		return $this->render('audio/view.php', compact('model'));
 	}

 	public function actionUpdate($id)
 	{
 		$model = $this->find($id);
 		return $this->render('audio/view.php', compact('model'));
 	}

 	public function actionDelete($id)
 	{
 		$model = $this->find($id);
 		return $this->render('audio/view.php', compact('model'));
 	}

 	public function find($id) {
 		if ($model = Audio::find_by_id($id)) {
 			return $model;
 		}
 		return (new ErrorController())->action404();
 	}

 } ?>