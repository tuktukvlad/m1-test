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


 	public function fields()
 	{
 		return [
 			/*'id' => 'Id',*/
 			'name' => 'Название альбома',
 			'artist' => 'Исполнитель',
 			'duration' => 'Длительность',
 			'image' => 'обложка',
 			'cost' => 'Стоимость',
 			'purchase_date' => 'Дата покупки',
 			'storage' => 'Место хранения',
 			'year' => 'Год',
 		];
 	}


 	public function delete() {
 		if (!empty($this->image) && file_exists (ROOT."/public".$this->image)) {
 			unlink(ROOT."/public".$this->image);
 		}
 		parent::delete();
 	}

 } ?>