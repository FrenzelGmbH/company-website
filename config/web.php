<?php
$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
	'id' => 'basic',
    'name' => 'cassandra',
	'basePath' => dirname(__DIR__),
	'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
	'charset'=>'UTF-8',
	'language' => 'en_US',
    'aliases' => [
        '@root' => realpath(__DIR__ . '/../'), // path to your composer.json file
    ],
	'modules' => [
	    'user' => [
          'class' => 'dektrium\user\Module',
          'admins' => ['philippfrenzel'],
          'components'=>[
            'manager' => [
                'userClass' => 'app\modules\app\components\User'
            ]
          ]
        ],
        'comments' => [
    		'class' => 'app\modules\comments\Comments'
    	],
        'messaging' => [
          'class' => 'app\modules\messaging\Messaging'
        ],		
        'revision' => [
            'class' => 'app\modules\revision\Revision',
        ],
        'tasks' => [
            'class' => 'app\modules\tasks\Task',
        ],
        'workflow' => [
            'class' => 'app\modules\workflow\Workflow',
        ],
        'pages' => [
            'class' => 'app\modules\pages\Pages',
        ],
        'tags' => [
            'class' => 'app\modules\tags\Tags',
        ],
        'posts' => [
            'class' => 'app\modules\posts\Posts',
        ],
        'parties' => [
            'class' => 'app\modules\parties\parties',
        ],
        'purchase' => [
            'class' => 'app\modules\purchase\purchase',
        ],
        'article' => [
            'class' => 'app\modules\article\article',
        ],
        'dms' => [
            'class' => 'app\modules\dms\dms',
        ],
        'categories' => [
          'class' => 'app\modules\categories\categories'
        ],
        'recipies' => [
            'class' => 'app\modules\recipies\recipies',
        ],
        'packaii' => [
            'class' => 'schmunk42\packaii\Module',
            'gitHubUsername' => 'philippfrenzel',
            'gitHubPassword' => 'cassandra0903'
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
	],
	'components' => [
        'urlManager'=>[
          'enablePrettyUrl' => false
        ],
        'request' => [
          'enableCsrfValidation' => true,
        ],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'assetManager' => [
          'converter'=>[
            'class'=>'nizsheanez\assetConverter\Converter',
            'force'=>false, // true : If you want convert your sass each time without time dependency
            'destinationDir' => 'assets', //at which folder of @webroot put compiled files
            'parsers' => [
              'less' => [ // file extension to parse
                'class' => 'nizsheanez\assetConverter\Less',
                'output' => 'css', // parsed output file type
              ]
            ]
          ]
        ],
        'authManager' => [
          'class' => 'app\modules\app\components\User',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\GoogleOpenId'
                ]
            ],
        ],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'mail' => [
			'class' => 'yii\swiftmailer\Mailer',
			'transport' => [        
                'class'        => 'Swift_SmtpTransport',
                'host'         => 'mail.simplebutmagnificent.com',
                'username'     => 'hello@simplebutmagnificent.com',
                'password'     => 'Cassandra0903#'
			],
            'messageConfig' => [
                'from'         => 'hello@simplebutmagnificent.com'
            ]
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
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

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = 'yii\debug\Module';
	$config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
