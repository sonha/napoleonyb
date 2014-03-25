<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
    return array(
        'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name'       => 'My Web Application',
        // preloading 'log' component
//        'preload'    => array('log'),
        // autoloading model and component classes
        'import'     => array(
            'application.helper.*',
            'application.models.*',
            'application.components.*',
            'application.extensions.*',
            'application.components.AuthClass.*',
            'application.components.BaseClass.*',
        ),
        'modules'    => array(
            // uncomment the following to enable the Gii tool
            'gii' => array(
                'class'    => 'system.gii.GiiModule',
                'password' => '123456',
            ),
        ),
        'behaviors'  => array(
            'runEnd' => array(
                'class' => 'application.components.WebApplicationEndBehavior',
            ),
        ),
        // application components
        'components' => array(
            'user'         => array(
                // enable cookie-based authentication
                'allowAutoLogin' => TRUE,
            ),
            // uncomment the following to enable URLs in path-format

              'urlManager'=>array(
              'urlFormat'=>'path',
              'rules'=>array(
              '<controller:\w+>/<id:\d+>'=>'<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
              '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
              ),
              ),

            // uncomment the following to use a MySQL database
            'db'           => array(
                'connectionString' => 'mysql:host=localhost;dbname=yfa',
                'emulatePrepare'   => TRUE,
                'username'         => 'root',
                'password'         => '',
                'charset'          => 'utf8',
            ),
            'bootstrap' => array(
                'class' => 'bootstrap.components.Bootstrap',
            ),
            'errorHandler' => array(
                // use 'site/error' action to display errors
                'errorAction' => 'site/error',
            ),
            'log'          => array(
                'class'  => 'CLogRouter',
                'routes' => array(
                    array(
                        'class'  => 'CFileLogRoute',
                        'levels' => 'error, warning',
                    ),
                    // uncomment the following to show log messages on web pages
//                    array(
//                        'class' => 'CWebLogRoute',
//                    ),
                ),
            ),
        ),
        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'     => array(
            // this is used in contact page
            'adminEmail' => 'hason61vn@gmail.com',
        ),
    );