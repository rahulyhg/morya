<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

define('WP_USE_THEMES', true);
$wp_did_header = true;
require_once('wordpress/wp-load.php');
 
require_once(dirname(__FILE__) . '/protected/components/ExceptionHandler.php');
$router = new ExceptionHandler();
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
