<?php 
namespace app\components;

/**
  * 
  */
 class Router
 {
 	private $rules = [];
 	private $_controller;
 	private $_action;
 	private $_params = [];
 	public $defaultController = 'main';
 	public $defaultAction = 'index';
	public $errorClass = '\\app\\components\\ErrorController';
	public $controllerNamespace = '\\app\\controllers\\';

 	function __construct($config)
 	{		
 			foreach ($config as $key => $value) {
				property_exists($this, $key) ? $this->$key = $value : null;
			}
			
			$this->setDefault();
 			$this->run();
 	}

 	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
		}
	}

	private function setDefault() {
		$this->setController($this->defaultController);
		$this->setAction($this->defaultAction);
	}

	private function setController($name) {
		$this->_controller = $this->controllerNamespace.ucfirst($name.'Controller');
	}

	private function setAction($name) {
		$this->_action = 'action'.ucfirst($name);
	}

	private function setParams($params) {
		$params ? $this->_params = $params : null;
	}

	private function setError($action) {
		$this->_controller = $this->errorClass;
		$this->setAction($action);
	}

	public function run()
	{
		$uri = $this->getURI();
	
		foreach ($this->rules as $uriPattern => $path) {

			if(preg_match("~$uriPattern~", $uri)) {

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				$path_segments = explode('/', $path);
				$segments = explode('/', $internalRoute);

				if (count($path_segments) == count($segments)) {					
					$this->setController(array_shift($segments));
					$this->setAction(array_shift($segments));
					$this->setParams($segments);

				} else {
					$this->setError('404');
				}

				break;
			}
		}
	}

	public function getController($config) {
		return new $this->_controller($config);
	}

	public function getAction() {
		return $this->_action;
	}


	public function getParams() {
		return $this->_params;
	}



 } ?>