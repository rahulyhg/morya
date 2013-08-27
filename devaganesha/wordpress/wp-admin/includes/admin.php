<?php
/**
 * Includes all of the WordPress Administration API files.
 *
 * @package WordPress
 * @subpackage Administration
 */

if ( ! defined('WP_ADMIN') ) {
	// This file is being included from a file other than wp-admin/admin.php, so
	// some setup was skipped. Make sure the admin message catalog is loaded since
	// load_default_textdomain() will not have done so in this context.
	load_textdomain( 'default', WP_LANG_DIR . '/admin-' . get_locale() . '.mo' );
}

/** WordPress Bookmark Administration API */
require_once(ABSPATH . 'wp-admin/includes/bookmark.php');

/** WordPress Comment Administration API */
require_once(ABSPATH . 'wp-admin/includes/comment.php');

/** WordPress Administration File API */
require_once(ABSPATH . 'wp-admin/includes/file.php');

/** WordPress Image Administration API */
require_once(ABSPATH . 'wp-admin/includes/image.php');

/** WordPress Media Administration API */
require_once(ABSPATH . 'wp-admin/includes/media.php');

/** WordPress Import Administration API */
require_once(ABSPATH . 'wp-admin/includes/import.php');

/** WordPress Misc Administration API */
require_once(ABSPATH . 'wp-admin/includes/misc.php');

/** WordPress Plugin Administration API */
require_once(ABSPATH . 'wp-admin/includes/plugin.php');

/** WordPress Post Administration API */
require_once(ABSPATH . 'wp-admin/includes/post.php');

/** WordPress Administration Screen API */
require_once(ABSPATH . 'wp-admin/includes/screen.php');

/** WordPress Taxonomy Administration API */
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php');

/** WordPress Template Administration API */
require_once(ABSPATH . 'wp-admin/includes/template.php');

/** WordPress List Table Administration API and base class */
require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
require_once(ABSPATH . 'wp-admin/includes/list-table.php');

/** WordPress Theme Administration API */
require_once(ABSPATH . 'wp-admin/includes/theme.php');

/** WordPress User Administration API */
require_once(ABSPATH . 'wp-admin/includes/user.php');

/** WordPress Update Administration API */
require_once(ABSPATH . 'wp-admin/includes/update.php');

/** WordPress Deprecated Administration API */
require_once(ABSPATH . 'wp-admin/includes/deprecated.php');

/** WordPress Multisite support API */
if ( is_multisite() ) {
	require_once(ABSPATH . 'wp-admin/includes/ms.php');
	require_once(ABSPATH . 'wp-admin/includes/ms-deprecated.php');
}

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