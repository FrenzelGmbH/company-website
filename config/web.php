<?php

$config = array(
	'id' => 'Frenzel Gmbh',
	'basePath' => dirname(__DIR__),
	'modules'=>array(
    'pages' => array(
      'class' => 'app\modules\pages\Pages',
    ),
    'posts' => array(
      'class' => 'app\modules\posts\Posts',
    ),
    'comments' => array(
			'class' => 'app\modules\comments\Comments'
		),
		'workflow' => array(
        'class' => 'app\modules\workflow\Workflow',
    ),
   'bikes' => array(
      'class' => 'app\modules\bikes\Bike',
    ),
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
		'user' => array(
			'class' => 'app\components\AppUser',
			'identityClass' => 'app\models\User',
		),
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
		'log' => array(
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => array(
				array(
					'class' => 'yii\log\FileTarget',
					'levels' => array('error', 'warning'),
				),
			),
		),
	),
	'params' => require(__DIR__ . '/params.php'),
);

if (YII_ENV_DEV) {
	$config['preload'][] = 'debug';
	$config['modules']['debug'] = 'yii\debug\Module';
	$config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
