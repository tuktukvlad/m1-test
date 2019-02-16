<?php 

namespace app\components;
/**
  * 
  */
 class ErrorController extends Controller
 {	

 	public $viewPath = 'views/errors';

 	public function action404() {
 		header("HTTP/1.0 404 Not Found");
 		$this->render('error404.php');
 		exit;
 	}

 } ?>