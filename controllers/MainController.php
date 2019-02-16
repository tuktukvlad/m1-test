<?php 
namespace app\controllers;

use App;
use app\components\Controller;
use app\models\Audio;

/**
  * 
  */
 class MainController extends Controller
 {
 	
 	public function actionIndex() {
 		$audio = Audio::find_all();
 		return $this->render('index.php', compact('audio'));
 	}

 	public function actionAbout() {
 		return $this->render('about.php');
 	}


 } ?>