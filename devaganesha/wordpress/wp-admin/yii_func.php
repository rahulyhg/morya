<?php
/******** 
	http://www.yiiframework.com/forum/index.php/topic/31212-discussion-off-the-wiki-article-integrating-wordpress-and-yii-still-another-approach-using-yii-as-the-routercontroller/page__st__20
	*********/
$config = ABSPATH. '../protected/config/main.php'; // path to config to admin section
require(ABSPATH . '../../framework/YiiBase.php'); // include YiiBase
 
// overrides Yii class
class Yii extends YiiBase
{
    // override Yii autolad
    public static function autoload($className)
    {
        $wp_classes = array(
            'Translation_Entry',
            'Translations', 
            'NOOP_Translations',
            'POMO_Reader',
            'POMO_FileReader',
            'POMO_StringReader',
            'POMO_CachedFileReader',
            'POMO_CachedIntFileReader',
            'MO',
            '_WP_Editors',    
        );
        if(!in_array($className, $wp_classes))
            YiiBase::autoload($className);
    }
}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// unregister default Yii autoload and register new
spl_autoload_unregister(array('YiiBase', 'autoload'));
spl_autoload_register(array('Yii','autoload'));

// create new aliases to models and components directories
Yii::setPathOfAlias( 'models', ABSPATH.'../protected/models/' );
Yii::setPathOfAlias( 'components', ABSPATH.'../protected/components/' );

// create Yii application, but not run it
Yii::createWebApplication($config);
