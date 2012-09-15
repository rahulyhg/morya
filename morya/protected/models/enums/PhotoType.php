<?php
define('UPLOAD_DIR',Yii::getPathOfAlias('webroot').'/upload/');
define('ORIGINAL_DIR',UPLOAD_DIR.'original/');
define('SCREEN_DIR',UPLOAD_DIR.'screen/');
define('THUMB_DIR',UPLOAD_DIR.'thumb/');
define('USER_PROFILE_PIC_DIR',UPLOAD_DIR.'user/');

define('ROOT_UPLOAD_DIR',Yii::app()->baseUrl .'/upload/');
define('RELATIVE_ORIGINAL_DIR',ROOT_UPLOAD_DIR.'/original/');
define('RELATIVE_SCREEN_DIR',ROOT_UPLOAD_DIR.'/screen/');
define('RELATIVE_THUMB_DIR',ROOT_UPLOAD_DIR.'/thumb/');
define('RELATIVE_USER_PROFILE_PIC_DIR',ROOT_UPLOAD_DIR.'/user/');

class PhotoType {
    const Original = 0;
    const Screen = 1;
    const Thumb = 2 ;
    const Profile = 3;

    public static $folderName = array(
        self::Original => ORIGINAL_DIR,
        self::Screen => SCREEN_DIR,
        self::Thumb => THUMB_DIR,
        self::Profile => USER_PROFILE_PIC_DIR,
    );

    public static $relativeFolderName = array(
        self::Original => RELATIVE_ORIGINAL_DIR,
        self::Screen => RELATIVE_SCREEN_DIR,
        self::Thumb => RELATIVE_THUMB_DIR,
        self::Profile => RELATIVE_USER_PROFILE_PIC_DIR,
    );

    public static $dimension = array(
        self::Original => array('width'=>1600,'height'=>900),
        self::Screen => array('width'=>600,'height'=>450),
        self::Thumb => array('width'=>150,'height'=>116),
    );
}