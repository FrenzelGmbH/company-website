<?php
$config = [
  'components' => [
    'db' => [
      'class' => 'yii\db\Connection',
      'dsn' => 'mysql:host=localhost;dbname=purepo',
      'username' => 'root',
      'password' => 'ph1l1pp',
      'charset' => 'utf8',
      'tablePrefix' => 'tbl_'
    ],
  ]
];

return $config;
