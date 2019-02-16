<?php 
namespace app\components;

/**
  * 
  */
 class View
 {	

 	public $viewPath = 'views';

 	function __construct($viewPath)
	{	
		$viewPath ? $this->viewPath = $viewPath : null;
	}

 	public function renderFile($file, $params = []) 
 	{

 		extract($params, EXTR_OVERWRITE);
 		try {
 			if (!file_exists($file)) {
 				throw new \Exception("Файл не найден: ".$file);
 			}			
 		} catch (\Exception $e) {
 			echo $e->getMessage();
 			die();
 		}
 		require $file;	
 	}

 	public function renderView($view, $params = []) 
 	{	
 		$file = ROOT.'/'.$this->viewPath.'/'.$view;	
 		ob_start();
		$this->renderFile($file, $params);
		$content = ob_get_clean();
 		return $content;
 	}

 	public function renderLayout($layout, $layoutPath, $content = '') 
 	{	

 		$file = ROOT.'/'.$layoutPath.'/'.$layout;
 		return $this->renderFile($file, compact('content'));
 	}


 } ?>