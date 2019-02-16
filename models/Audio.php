<?php 
namespace app\models;

use app\components\DbModel;
/**
  * 
  */
 class Audio extends DbModel
 {
 	public static $table = 'audio';

 	public $id;
 	public $name;
 	public $artist;
 	public $duration;
 	public $image;
 	public $cost;
 	public $purchase_date;
 	public $storage;
 	public $year;

 } ?>