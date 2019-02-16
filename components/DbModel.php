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
		/*$found = $database->fetch_array($result_set);
		return $found;*/
	}

	static function find_all() {
		return self::find_by_sql("SELECT * FROM ".static::$table);
	}
}

 ?>