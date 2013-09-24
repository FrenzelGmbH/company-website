<?php
$params = require(__DIR__ . '/params.php');
return array(
	'id' => 'bootstrap-console',
	'basePath' => dirname(__DIR__),
	'preload' => array('log'),
	'controllerPath' => dirname(__DIR__) . '/commands',
	'controllerNamespace' => 'app\commands',
	'modules' => array(
	),
	'components' => array(
		'db' => array(
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=powershop2',
            'username' => 'root', 
            'password' => '',
            'tablePrefix' => 'tbl_',
		),
		'cache' => array(
			'class' => 'yii\caching\FileCache',
		),
		'seeder'=>array(
			'class'    =>'app\components\DbFixtureManager',
			'basePath' => dirname(__DIR__).'/migrations/seed',
    ),
		'log' => array(
			'targets' => array(
				array(
					'class' => 'yii\log\FileTarget',
					'levels' => array('error', 'warning'),
				),
			),
		),
	),
	'params' => $params,
);
