<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use philippfrenzel\yii2tooltipster\yii2tooltipster;
use yii\bootstrap\Modal;

use kartik\icons\Icon;
use app\modules\app\widgets\wgtLanguage;  

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);

Icon::map($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" href="favicon.ico">
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= yii2tooltipster::widget(['options'=>['class'=>'.tipster']]); ?>

<?php 
	Modal::begin([
	  'id'=>'applicationModal',
	  'header' => '<h4><i class="icon-meter-medium"></i>Loading</h4>',
	]);
	echo 'pls. wait one moment...';
	Modal::end();
?>


	<?php
		$MenuItems = NULL;
		//menu items visible for administrator
		if(!Yii::$app->user->isGuest){
			$subMenuAdmin[] = ['label'=>Icon::show('folder-open', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Paper Runner'),'url' => ['/dms/dmpaper/index']];
			$subMenuAdmin[] = ['label'=>Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Blog'),'url' => ['/posts/post/index']];
			$subMenuAdmin[] = ['label'=>Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','CMS'),'url' => ['/pages']];
			$subMenuAdmin[] = ['label'=>Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Revision'),'url' => ['/revision']];
			$subMenuAdmin[] = ['label'=>Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Countries'),'url' => ['/parties/country']];						
			$subMenuAdmin[] = ['label' => Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Vendors'), 'url'=>['/parties/party/index','type'=>'Vendors']];
			$subMenuAdmin[] = ['label' => Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Articles'), 'url'=>['/article/article/index','type'=>'Article']];
      $subMenuAdmin[] = ['label' => Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Purchase Requests'), 'url'=>['/purchase/purchase-order/index']];
			$MenuItems = ['label' => Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Administration'), 'url' => '','items' => $subMenuAdmin];
		};

		NavBar::begin([
			'brandLabel' => Yii::t('app','Purchase Order Request System'),
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-default navbar-fixed-top',
			],
		]);		

		if (!Yii::$app->user->isGuest){
			echo Icon::show('building-o', ['class'=>'fa navbar-left navbar-brand'], Icon::FA);

		  if(class_exists('\app\modules\parties\widgets\PortletPartyInfo')){
		    echo \app\modules\parties\widgets\PortletPartyInfo::widget(array(
		      'enableAdmin'=>false,
		      'id' => \Yii::$app->user->identity->currentEntityId,
		      'title' => NULL,
		      'isNav' => true
		    ));
		  } 	
	  }

	  ?>

		<?php if (!Yii::$app->user->isGuest): ?>
			<div class="navbar-left navbar-brand">
				<?= Icon::show('user', ['class'=>'fa fa-1x'], Icon::FA); ?>	
				<a href="<?= Url::to(['/profile/view','id'=>Yii::$app->user->identity->id]); ?>"><?= Yii::$app->user->identity->username; ?></a>			
			</div>
		<?php endif; ?>
		
	  <?php
	  	echo wgtLanguage::widget();		
		?>

		<?php
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'encodeLabels' => false,
			'items' => [
				['label' => Icon::show('home', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Home'), 'url' => ['/site/index']],
				['label' => Icon::show('sign-in', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Login'), 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],
				['label' => Icon::show('pencil', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Registration'), 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
				is_array($MenuItems)?$MenuItems:'',
        ['label' => Icon::show('sign-out', ['class'=>'fa'], Icon::FA) . ' ' .Yii::t('app','Logout'), 'url' => ['/user/security/logout'], 'visible' => !Yii::$app->user->isGuest, 'linkOptions' => ['data-method' => 'post']],				
			],
		]);		
		NavBar::end();
	?>

  <div id="maincontent" class="container">
    <?= $content ?>
  </div>

	<footer class="footer">
		<div class="container">
			<div class="col-md-4 md-margin-bottom-40">
				<h3>About</h3>
				<p>purePO is a modern lightweight and KISS purchase order system.</p>
			</div>
			<div class="col-md-4 md-margin-bottom-40">
				
			</div>
			<div class="col-md-4">
				<h3>Contact Us</h3>
				<p>
					Frenzel GmbH <br>
					Hohewartstr. 32 <br>
					GER - 70469 Stuttgart
				</p>
				<a href="<?php echo Url::to(['/site/contact']); ?>"><?= Yii::t('app','Contact'); ?></a>
			</div>
		</div>
	</footer>

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<p class="copyright-space">
						Frenzel GmbH 2013
					</p>
				</div>
				<div class="col-md-8">
					<p class="copyright-space">
						<?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
             ]) ?>
					</p>
				</div>
			</div>
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
