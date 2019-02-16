<?php 
define(ROOT, dirname(__DIR__));


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once ROOT.'/vendor/autoload.php';
require_once ROOT.'/config/config.php';

(new \App($config))->run();
?>