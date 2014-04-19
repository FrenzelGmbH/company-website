<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
	'id' => 'basic-console',
	'basePath' => dirname(__DIR__),
	//'controllerPath' => dirname(__DIR__) . '/modules/app/commands',
	'controllerNamespace' => 'app\modules\app\commands',
	'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
	'modules' => [
		 'user' => 'dektrium\user\Module',
	],
	'components' => [
		'seeder'=>[
			'class'    =>'app\components\DbFixtureManager',
			'basePath' => dirname(__DIR__).'/migrations/seed',
    ],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => $db,
	],
	'params' => $params,
];
