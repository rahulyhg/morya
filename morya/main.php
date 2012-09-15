<?php

// uncomment the following to define a path alias
//Yii::setPathOfAlias('upload',Yii::getPathOfAlias('webroot').'/upload/');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Ganpati Bappa Morya',
	//'subtitle'=>'Site for Entire Ganesh Utsav Coverage',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.widgets.*',
		'application.controllers.*',
		'application.models.enums.*',
		'application.components.*',
		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'omhari',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'session' => array(
			   'autoStart'=>true,  
		),
		'user'=>array(
			'loginUrl' => array('user/login'),
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'm:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ganestlc_test',
			'emulatePrepare' => true,
			'username' => 'ganestlc_viewer',
			'password' => 'redhat',
			'charset' => 'utf8',
			//'initSQLs'=>array("set time_zone='+00:00';"),
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		/********* Facebook Component **********/
		'facebook'=>array(
			'class' => 'ext.yii-facebook-opengraph.SFacebook',
			'appId'=>'493477977331627', // needed for JS SDK, Social Plugins and PHP SDK
			'secret'=>'2688f157da5115c3e2ce580ed238a08c', // needed for the PHP SDK
			'locale'=>'en_US', // override locale setting (defaults to en_US)
			'jsSdk'=>true, // don't include JS SDK
			'async'=>true, // load JS SDK asynchronously
			'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
			'status'=>true, // JS SDK - check login status
			'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
			'oauth'=>true,  // JS SDK - enable OAuth 2.0
			'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
			'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
			'html5'=>true,  // use html5 Social Plugins instead of XFBML
			// 'ogTags'=>array(  // set default OG tags
				// 'title'=>'Global Ganesh Festival',
				// 'description'=>'MY_WEBSITE_DESCRIPTION',
				// 'image'=>'URL_TO_WEBSITE_LOGO',
			// ),
	  ),
		'phpThumb'=>array(
			'class'=>'ext.EPhpThumb.EPhpThumb',
			'options'=>array('ar'=>'p')
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);