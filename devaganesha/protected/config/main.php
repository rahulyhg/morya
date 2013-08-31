<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Devaganesha.com',
	'theme'=>'morya',
	//'subtitle'=>'Site for Entire Ganesh Utsav Coverage',
	// preloading 'log' component
	'preload'=>array('log'),

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.db.*',
		'application.models.enums.*',
		'application.models.behavior.*',
		'application.models.vm.user.*',
        'application.widgets.*',
		'application.controllers.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'morya',
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
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
			''=>'site/index',
				'login'=>'user/login',
				'myganesha'=>'site/myganesha',
				'edit-profile'=>'user/edit',
				'logout'=>'user/logout',
				'register'=>'user/register',
				'feed/aarti-shlokas-mantra'=>'site/page/view/vedic',
				'feed/pictures-and-wallpapers'=>'site/page/view/photo',
				'pictures-and-wallpapers'=>'photo/index',
				'aarti-shlokas-mantra/<slug>'=>'vedic/vedicview',
				'aarti'=>array('vedic/vedic','defaultParams'=>array('type'=>0)),
				'mantra'=>array('vedic/vedic','defaultParams'=>array('type'=>1)),
				'aarti-shlokas-mantra'=>'vedic/vedic',
				'add-aarti'=>array('vedic/addvedic','defaultParams'=>array('type'=>0)),
				'add-mantra'=>array('vedic/addvedic','defaultParams'=>array('type'=>1)),
				'aarti-shlokas-mantra'=>'vedic/vedic',
				'recipies-for-ganesh-utsav/<rec_title>'=>'recipe/recipeview',
				'pictures-and-wallpapers/<slug>'=>'photo/view',
				'temples'=>array('temple/index','defaultParams'=>array('type'=>0)),
				'mandals'=>array('temple/index','defaultParams'=>array('type'=>1)),
				'temples-and-mandals'=>'temple/index',
				'temples-and-mandals/<slug>'=>'temple/templeview',
				'add-temples'=>array('temple/create','defaultParams'=>array('type'=>0)),
				'add-mandals'=>array('temple/create','defaultParams'=>array('type'=>1)),
				'recipes-for-ganesh-utsav'=>'recipe/index',
				'recipes-for-ganesh-utsav/<slug>'=>'recipe/recipeview',
				'add-recipes'=>'recipe/create',
				'ganesh-mahima'=>'experience/index',
				'ganesh-mahima/<slug>'=>'experience/expview',
				'node' => 'site/node',
				'<view>'=>array('site/page'),
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
	/*	'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		), */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=morya',
			'initSQLs'=>array("set time_zone='+05:30';"), 
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
			// the above is unused for 404 errors, as those
        // are handled by Wordpress using our exception handler
		),
		'log'=>
			array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),/*
				array(
					'class'=>'CWebLogRoute',
				),
				
				array(
			
					'class'=>'CLogRouter',
					'routes'=>array(
						array(
						'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
						'ipFilters'=>array('127.0.0.1'),
						),*/
					),
				),
		/********* Facebook Component **********/
		'facebook'=>array(
			'class' => 'ext.yii-facebook-opengraph.SFacebook',
			'appId'=>'231642110292386', // needed for JS SDK, Social Plugins and PHP SDK
			'secret'=>'e3e791c5e4c02a3931138506a49f2a61', // needed for the PHP SDK
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
			'fileUpload'=>true, 
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
		
		'swiftMailer' => array(
			'class' => 'ext.swiftMailer.SwiftMailer',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName'] (--thanks for this documentation :D -swapnil)
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'mail@itvedant.com',
		'doNotReplyEmail'=>'noreply@devaganesha.com',
		'doNotReplyPass'=>'Zeus123@',
		'OAuth2.0ClientId'=>'782990223644.apps.googleusercontent.com',
		'OAuth2.0ClientSecret'=>'AbmIF3_1AEpZJL6fQHgNX_hH',
		'OAuth2.0RedirectURI'=>'http://www.devaganesha.com/site/oauth',
	),
);