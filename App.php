<?php 

use app\components\Controller;
use app\components\Router;
use app\components\Db;
/**
 * 
 */

class App
{	

	public static $app;

	private $_config;
	public $router = [];
	public $controller = [];
	public $db;


	function __construct($config)
	{	
		foreach ($config as $key => $value) {
			property_exists($this, $key) ? $this->$key = $value : '';
		}
		$this->_config = $config;
		self::$app = $this;
	}

	public function run() {
		
		$this->router = (new Router($this->router));
		$controller = $this->router->getController($this->controller);
		$action = $this->router->getAction();
		$params = $this->router->getParams();


		try {
		    $this->db = new Db($this->_config['db']);
		} catch (PDOException $e) {
		    die('Подключение не удалось: ' . $e->getMessage());
		}
		
		call_user_func_array([$controller, $action], $params);
		
	}

	public static function getInstance() {
		return self::$app;
	}
}

?>