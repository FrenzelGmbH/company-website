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
  ]
];

return $config;
