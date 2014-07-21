<?php
$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'name' => 'frenzelgmbh',
    'basePath' => dirname(__DIR__),
    //'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
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
                'userClass' => 'frenzelgmbh\appcommon\components\User'
            ]
          ]
      ],
      'comments' => [
            'class' => 'app\modules\comments\Comments'
        ],
      'golfteamplanner'=>[
        'class'=>'frenzelgmbh\golfteamplanner\Module',
        'mainLayout' => 'main_admin',
      ],
      'posts' => [
          'class' => 'frenzelgmbh\sblog\Module',
      ],
      'appcommon'=>[
        'class'=>'frenzelgmbh\appcommon\Module',
      ],
      'address'=>[
        'class'=>'frenzelgmbh\cmaddress\Module',
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
          'class' => 'frenzelgmbh\scms\Module',
      ],
      'tags' => [
          'class' => 'app\modules\tags\Tags',
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
        'class' => 'frenzelgmbh\cmcategories\Module'
      ],
      'communication' => [
        'class' => 'frenzelgmbh\cmcommunication\Module'
      ],
      'entity' => [
        'class' => 'frenzelgmbh\cmentity\Module'
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
          'cookieValidationKey' => 'mysecrethobby',
        ],
            'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
        /*'authManager' => [
          'class' => 'frenzelgmbh\appcommon\components\User',
        ],*/
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
