<?php 

namespace app\components;

/**
 * 
 */
class Controller
{	
	public $layout = 'default.php';
	public $layoutPath = 'views/layouts';
	public $viewPath = 'views';
	
	
	function __construct($config = [])
	{	
		foreach ($config as $key => $value) {
			property_exists($this, $key) ? $this->$key = $value : null;
		}
	}

	public function render($viewfile, $params = []) {
		$view = new View($this->viewPath);
		$content = $view->renderView($viewfile, $params);
		return $view->renderLayout($this->layout, $this->layoutPath, $content);
	}

}

 ?>