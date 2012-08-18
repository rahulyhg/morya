<?php
define('UPLOAD_DIR',Yii::getPathOfAlias('webroot').'/upload/');
define('ORIGINAL_DIR',UPLOAD_DIR.'/original/');
define('SCREEN_DIR',UPLOAD_DIR.'/screen/');
define('THUMB_DIR',UPLOAD_DIR.'/thumb/');
class PhotoType {
	const Original = 0;
	const Screen = 1;
	const Thumb = 2 ;
	
	public static $folderName = array(
						self::Original => ORIGINAL_DIR,
						self::Screen => SCREEN_DIR,
						self::Thumb => THUMB_DIR,
						);
	public static $dimension = array(
						self::Original => array('width'=>1600,'height'=>900),
						self::Screen => array('width'=>800,'height'=>600),
						self::Thumb => array('width'=>240,'height'=>160),
						);
}