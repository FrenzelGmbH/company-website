<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\widgets\Breadcrumbs;
use app\assets\BlogAsset;

use Yii2Tooltipster\Yii2Tooltipster;
use yii\bootstrap\Modal;

use kartik\icons\Icon;
use app\modules\app\widgets\wgtLanguage;  

/**
 * @var \yii\web\View $this
 * @var string $content
 */
BlogAsset::register($this);

Icon::map($this);

$jumpJS = <<<JUMPSS
$(function () {
    $.scrollUp({
    	scrollImg: true,
    	scrollText: 'Scroll Up!'
    });
});
JUMPSS;
$this->registerJs($jumpJS);

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

<?= Yii2Tooltipster::widget(['options'=>['class'=>'.tipster']]); ?>

<?php 
	Modal::begin([
	  'id'=>'applicationModal',
	  'header' => '<h4><i class="icon-meter-medium"></i>Loading</h4>',
	]);
	echo 'pls. wait one moment...';
	Modal::end();
?>


<div> <!-- style="background-image: url('img/blog_web.jpg');background-repeat:no-repeat; min-height: 750px;background-size: 100%;" /-->

<header>
	<?php
		$MenuItems = NULL;
		//menu items visible for administrator
		if(!Yii::$app->user->isGuest){
			$subMenuAdmin[] = ['label'=>Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Blog'),'url' => ['/posts/post/index']];
			$MenuItems = ['label' => Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Administration'), 'url' => '','items' => $subMenuAdmin];
		};

		NavBar::begin([
			'brandLabel' => Yii::t('app','Simple But Magnificient'),
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-default navbar-fixed-top',
			],
		]);

	  ?>
		
		<?php if (!Yii::$app->user->isGuest): ?>
			<div class="navbar-left navbar-brand">
				<?= Icon::show('user', ['class'=>'fa fa-1x'], Icon::FA); ?>	
				<a href="<?= Url::to(['/profile/view','id'=>Yii::$app->user->identity->id]); ?>"><?= Yii::$app->user->identity->username; ?></a>			
			</div>
		<?php endif; ?>

		<?php
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'encodeLabels' => false,
			'items' => [
				['label' => Icon::show('home', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Home'), 'url' => ['/site/index']],
				['label' => Icon::show('sign-in', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Login'), 'url' => ['/user/auth/login'], 'visible' => Yii::$app->user->isGuest],
				['label' => Icon::show('pencil', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Registration'), 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
				is_array($MenuItems)?$MenuItems:'',
        ['label' => Icon::show('sign-out', ['class'=>'fa'], Icon::FA) . ' ' .Yii::t('app','Logout'), 'url' => ['/user/auth/logout'], 'visible' => !Yii::$app->user->isGuest, 'linkOptions' => ['data-method' => 'post']],				
			],
		]);	
		
		NavBar::end();
	?>
</header>

<div style="padding-top:50px;">&nbsp;</div>

<div class="container">
	<div class="headlogo">
		<img src="img/fatbanner.png" alt="Simple but Magnificient" align="center"></img>
	</div>
</div>

<div id="maincontent" class="container">	  		
	<?= $content ?>  
</div>

</div>

<!--footer>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?= Breadcrumbs::widget([
		              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		             ]) ?>
				</div>
				<div class="col-md-3">
					<div>
						Cassandra Pate
					</div>
				</div>
			</div>
		</div>
	</div>
</footer/-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
