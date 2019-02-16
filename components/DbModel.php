<?php 
namespace app\components;

/**
 * 
 */
class DbModel
{
	private $_db;

	function __construct()
	{
		$this->_db = \App::$app->db;
	}

	private static function instantiate($record) {
		$object = new static;	
			foreach ($record as $attribute => $value) {
				if (property_exists($object, $attribute )) {
					$object->$attribute = $value;
				}
			}
		return $object;
	}

	static function find_by_sql($sql="") {
		$db = (new static)->_db;
		$result_set =  $db->query($sql);
		$object_array = array();
		while ($row = $result_set->fetch())
		{
		    $object_array[] =  self::instantiate($row);
		}

		return $object_array;
	}

	static function find_by_id($id=0) {
		$db = (new static)->_db;
		$result_array = self::find_by_sql("SELECT * FROM ".static::$table." WHERE id=".$db->quote($id)." LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	static function find_all($where = [], $order = []) {
		$sql = "SELECT * FROM ".static::$table;
		if (!empty($where)) {
			$prepare_data= [];
			$model = new static;
			foreach ($where as $key => $value) {
				if (array_key_exists($key, $model->fields())) {
					$prepare_data[]= $key."=".$model->_db->quote($value);
				}			
			}
			$sql .= " WHERE " . join(", ", $prepare_data);
		}
		
		return self::find_by_sql($sql);
	}

	public function save() {
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {

		$db = $this->_db;
		
		$fields = get_object_vars($this);

		$prepare_data= [];

		foreach (get_object_vars($this) as $key => $value) {
			if (array_key_exists($key, $this->fields())) {
				$prepare_data[$key]= $db->quote($value) ;
			}			
		}
		
		$sql = "INSERT INTO " . static::$table . " (";
		$sql .= join(", ", array_keys($prepare_data));
		$sql .= ") VALUES (";
		$sql .= join(", ", array_values($prepare_data));
		$sql .= ")";

		
		if ($db->query($sql)) {
			$this->id = $db->lastInsertId();
			return true;
		}
		return false;
	}

	public function update() {
		$db = $this->_db;

		$prepare_data= [];
		foreach (get_object_vars($this) as $key => $value) {
			if (array_key_exists($key, $this->fields())) {
				$prepare_data[]= $key."=".$db->quote($value);
			}			
		}
		
		$sql = "UPDATE " . static::$table . " SET ";
		$sql .= join(", ", $prepare_data);
		$sql .= " WHERE id=" . $db->quote($this->id);

		return $db->query($sql) ? true : false;
	}

	public function delete() {
		$db = $this->_db;

		$sql = "DELETE FROM " . static::$table;
		$sql .= " WHERE id=" . $db->quote($this->id);
		$sql .= " LIMIT 1";

		$db->query($sql);

		return $db->query($sql) ? true : false;
	}


	public function load($array) {
		foreach ($array as $field => $value) {
			if (property_exists($this, $field )) {
				$this->$field = $value;
			}
		}
		return $this;
	}

	public function checkImage($type)
	{
	    $allowedTypes = array("image/pjpeg", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/gif");

	    if (!in_array($type, $allowedTypes)) {
	        return false;
	    }
	    return true;
	}	
}

 ?>