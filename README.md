purepo
======

Purchase Request - Purchaseorder

- Order-Management

Setup
=====

WebServer
=========

1) Pls. follow the instructions on: http://www.wikihow.com/Install-XAMPP-for-Windows
2) Install the github client from: http://www.github.com
3) Install the comandline utils inside the github client

WebApplication
==============

0) Go to the http folder of your new xampp installation
1) Clone from github repository (using github client)
2) update composer in shell >php composer.phar update
2.1) update config in "config/web.php" (db-settings)
3) run migrations
 >php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
 >php yii migrate
4) seed data
 >php yii seed 
5) open url ;) (localhost...)

Setup
=====

1) Clone from github repository
2) update composer in shell >php composer.phar update
3) run migrations
 >php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
 >php yii migrate
4) seed data
 >php yii seed 
5) open url ;)

About
=====

 * Authors: Philipp Frenzel

Thanks
======

yii - framework developers
bootstrap - css framework developers