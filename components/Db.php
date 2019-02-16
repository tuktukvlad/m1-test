<?php 
namespace app\components;

class Db extends \PDO {

    private static $db = NULL;

    public function __construct($config) {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};";
        parent::__construct($dsn, $config['user'], $config['password']);
        return $this;
    }

/*    public static function getDb() {
        if (is_null(self::$db)) {
            self::$$db = new self;
        }
        return self::$db;
    }*/

}
?>