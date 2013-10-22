<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use Yii2Tooltipster\Yii2Tooltipster;
use \yii\bootstrap\Modal;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
app\config\AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo Yii::$app->charset; ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" href="favicon.ico">
	<title><?php echo Html::encode($this->title); ?></title>
	<?php $this->head(); ?>
</head>
<body>

<?= Yii2Tooltipster::widget(array('options'=>array('class'=>'.tipster'))); ?>

<?php 
	Modal::begin(array(
	  'id'=>'applicationModal',
	  'header' => '<h4><i class="icon-meter-medium"></i>Loading</h4>',
	  'options' => array(
	  		'width'=>'600px',
	  ),
	));
	echo 'pls. wait one moment...';
	Modal::end();
?>

<div class="masthead">
	<div class="container">
		<img src="images/logo_powershop_v2.png"></img>		
		<h2 class="muted pull-right fg-color-grayLight">
		<?php if (!Yii::$app->user->isGuest): ?>
			<i class="icon-user"></i> <a href="<?php echo Html::Url(array('user/view','id'=>Yii::$app->user->identity->id)); ?>"><?php echo Yii::$app->user->identity->username; ?></a>
			<a href="<?php echo Html::Url(array('/site/logout')); ?>" class="fg-color-orange"><i class="icon-signout"></i></a>
		<?php else: ?>
			<a href="<?php echo Html::Url(array('/site/login')); ?>" class="fg-color-orange"><i class="icon-signin"></i></a>
		<?php endif; ?>
		</h2>
	</div>
</div>

<?php $this->beginBody(); ?>
	<?php
		NavBar::begin(array(
			'brandLabel' => 'Frenzel GmbH',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => array(
				'class' => 'navbar-inverse',
			),
		));

		$menuItems = array();
		$menuItems[] = array('label' => '<i class="icon-home"></i> Startseite', 'url' => array('/site/index'));
		$menuItems[] = array('label' => '<i class="icon-envelope"></i> Kontakt', 'url' => array('/site/contact'));

		$rootNodes = app\modules\pages\models\Page::getRootNodes();
		foreach($rootNodes AS $Node)
			$menuItems[] = array('label'=>'<i class="icon-book"></i> '.Yii::t('app',$Node->title), 'url' => array('/pages/page/onlineview','id'=>$Node->id));
		
		//menu items visible for administrator
		if(Yii::$app->user->isAdmin){
			$subMenuAdmin[] = array('label'=>Yii::t('app','Bikes'),'url' => array('/bikes'));
			$subMenuAdmin[] = array('label'=>Yii::t('app','Content'),'url' => array('/pages'));
			$subMenuAdmin[] = array('label'=>Yii::t('app','Blog'),'url' => array('/posts'));
			$subMenuAdmin[] = array('label'=>Yii::t('app','User'),'url' => array('/user/admin'));
			$subMenuAdmin[] = array('label'=>Yii::t('app','File Manager'),'url' => array('/site/filemanager'));
			
			$menuItems[] = array('label' => '<i class="icon-gears"></i> '.Yii::t('app','Administration'), 'url' => '','items' => $subMenuAdmin);
		};


		echo Nav::widget(array(
			'encodeLabels' => false,
			'options' => array('class' => 'navbar-nav pull-right'),
			'items' => $menuItems,				
		));
		NavBar::end();
	?>

	<div id="wrapper" class="container">
		<?php echo $content; ?>
	</div>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-3">
					<div class="footer-box">
						<h4 class="fg-color-orange">Kontakt</h4>
						<address>
						Hohewartstr. 32	<br>
						D-70469 Stuttgart <br>

						Tel. 0049 - 7964 - 33 17 54 <br>
						Fax. 0049 - 7664 - 33 17 55 <br>

						Mail. info@frenzel.net
						</address>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-box">
						<h4 class="fg-color-orange">Abkürzungen</h4>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-box">
						<h4 class="fg-color-orange">Sozialenetze</h4>
						<ul>
							<li class="liicon fg-color-white bg-color-orange smallspace"><i class="icon-facebook"></i></li>
							<li class="liicon fg-color-white bg-color-orange smallspace"><i class="icon-google-plus"></i></li>
						</ul>
					</div>
				</div>
			</div>					
		</div>
	</footer>

	<footer class="lastfooter">
		<div class="container">
			<div class="footer-box">
				<p class="pull-left fg-color-white">Build by creative people on a happy base! ;) <?php echo date('Y'); ?></p>
				<p class="pull-right fg-color-white">&copy; Frenzel GmbH <?php echo date('Y'); ?></p>
			</div>
		</div>
	</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
