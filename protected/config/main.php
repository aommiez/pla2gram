<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Pla2Gram',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.facebook.SBaseFacebook',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'caseSensitive' => false,
            'showScriptName' => false,
            'urlFormat'=>'path',
            'rules'=>array(

                'gii'=>'gii',
                'gii/<controller:[\w\-]+>'=>'gii/<controller>',
                'gii/<controller:[\w\-]+>/<action:\w+>'=>'gii/<controller>/<action>',

                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<id:\d+>/<title>'=>'<controller>/view',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',

            ),
        ),
        'facebook'=>array(
            'class' => 'ext.yii-facebook-opengraph.SFacebook',
            'appId'=>'413892292015301', // needed for JS SDK, Social Plugins and PHP SDK
            'secret'=>'5fa170f45bec31af24abbdcb291b0dab', // needed for the PHP SDK
            'fileUpload'=>true, // needed to support API POST requests which send files
            //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
            'locale'=>'en_US', // override locale setting (defaults to en_US)
            'jsSdk'=>true, // don't include JS SDK
            'async'=>true, // load JS SDK asynchronously
            //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
            'status'=>true, // JS SDK - check login status
            'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
            'oauth'=>true,  // JS SDK - enable OAuth 2.0
            'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
            //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
            'html5'=>true,  // use html5 Social Plugins instead of XFBML
            'ogTags'=>array(  // set default OG tags
            'title'=>'PLA2GRAM.COM : Stylize your photo',
            'description'=>'PLA2GRAM.COM : Stylize your photo',
            'image'=>'http://www.pla2gram.com/images/pla2gram.png',
            ),
        ),
        'cache'=>array(
            'class'=>'system.caching.CMemCache',
            'servers'=>array(
                array('host'=>'localhost', 'port'=>11211, 'weight'=>100),
                //array('host'=>'localhost', 'port'=>11211, 'weight'=>40),
            ),
        ),
        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
        */
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=pla2gram',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '111111',
			'charset' => 'utf8',
            'enableProfiling'=> true,
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
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@pla2gram.com',
	),
);