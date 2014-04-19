<?php
$config = [
  'components' => [
    'db' => [
      'class' => 'yii\db\Connection',
      'dsn' => 'mysql:host=localhost;dbname=purepo',
      'username' => 'root',
      'password' => '',
      'charset' => 'utf8',
      'tablePrefix' => 'tbl_'
    ],
  ],
  'modules'=> [
    'packaii' => [
        'class' => 'schmunk42\packaii\Module',
        'gitHubUsername' => 'philippfrenzel',
        'gitHubPassword' => 'cassandra0903'
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
  ]
];

return $config;
