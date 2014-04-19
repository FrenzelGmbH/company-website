<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\widgets\Breadcrumbs;
use app\assets\BlogAsset;

use philippfrenzel\yii2tooltipster\yii2tooltipster;
use philippfrenzel\yii2pinit\yii2pinit;
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
	<meta name="keywords" lang="en" content="Fashion, Lifestyle, Food, Hangouts, Simple But Magnificient, Travel, City, DIY, Do It Yourself, Friends, Style, Webdesign" />
	<meta name="description" content="Simple But Magnificient is a fashion and lifestyle blog for all resonable topics like food, traveling, clothes, lunch, breakfast and more..." />
	<meta name="Page-Topic" content="Fashion and Lifestyle" />
	<meta name="author" content="Cassandra Pate" />
	<meta name="copyright" content="Cassandra Pate" />
	<meta name="robots" content="index,follow" />
	<meta name="revisit-after" content="7 days" />
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= yii2tooltipster::widget(['options'=>['class'=>'.tipster']]); ?>

<?= yii2pinit::widget(); ?>

<?php 
	Modal::begin([
	  'id'=>'applicationModal',
	  'header' => '<h4>Loading</h4>',
	  'size' => 'modal-lg',
	]);
	echo 'one moment';
	Modal::end();
?>


<div class="container-fluid bg_white">
	<div class="headlogo">
		<div class="row">
			<div class="col-md-12">
				<a href="http://www.simplebutmagnificent.com" target="_self">
					<img src="img/logo2_2.png" alt="Simple but Magnificient" align="center" class="img-responsive"></img>
				</a>
			</div>
		</div>		
	</div>
</div>

<header>
	<?php
		$MenuItems = NULL;
		//menu items visible for administrator
		if(!Yii::$app->user->isGuest){
				$subMenuAdmin[] = ['label' => Icon::show('folder-open', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Paper Runner'),'url' => ['/dms/dmpaper/index']];
				$subMenuAdmin[] = ['label' => Icon::show('bullhorn', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Blog'),'url' => ['/posts/post/index']];				
				$subMenuAdmin[] = ['label' => Icon::show('cogs', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','CMS'),'url' => ['/pages']];
				$subMenuAdmin[] = ['label' => Icon::show('list-ul', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Categories'),'url' => ['/categories']];
				$subMenuAdmin[] = ['label' => Icon::show('dot-circle-o', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Revision'),'url' => ['/revision']];
				$subMenuAdmin[] = ['label' => Icon::show('globe', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Countries'),'url' => ['/parties/country']];						
				$subMenuAdmin[] = ['label' => Icon::show('book', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Vendors'), 'url'=>['/parties/party/index','type'=>'Vendors']];
				$subMenuAdmin[] = ['label' => Icon::show('shopping-cart', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Articles'), 'url'=>['/article/article/index','type'=>'Article']];
    		$subMenuAdmin[] = ['label' => Icon::show('folder-open-o', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Purchase Requests'), 'url'=>['/purchase/purchase-order/index']];
    		$MenuItems = ['label' => Icon::show('gears', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','admin'), 'url' => '','items' => $subMenuAdmin];
		};

		NavBar::begin([
			'brandLabel' => '',
			'brandUrl' => '#',
			'options' => [
				'class' => 'navbar-xs',
			],
		]);
	  ?>

		<?php
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'encodeLabels' => false,
			'items' => [
				['label' => Yii::t('app','home'), 'url' => ['/site/index']],
				['label' => Yii::t('app','about'), 'url' => ['/pages/page/onlineview','id'=>1]],
				['label' => Yii::t('app','press'), 'url' => ['/pages/page/onlineview','id'=>2]],
				['label' => Yii::t('app','contact'), 'url' => ['/site/contact']],
				//['label' => Yii::t('app','login'), 'url' => ['/user/auth/login'], 'visible' => Yii::$app->user->isGuest],
				//['label' => Yii::t('app','registration'), 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
				is_array($MenuItems)?$MenuItems:'',
        ['label' => Yii::t('app','logout'), 'url' => ['/user/security/logout'], 'visible' => !Yii::$app->user->isGuest, 'linkOptions' => ['data-method' => 'post']],				
			],
		]);	
		
		NavBar::end();
	?>
</header>

<div id="maincontent" class="container clearfix">		
	<?= $content ?>  
</div>

<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
 ]) ?>


<!-- Start Piwik Code -->
<img src="http://simplebutmagnificent.com/analytics/piwik.php?idsite=1&rec=1&action_name=<?= $this->title; ?>" style="border:0;" alt="" />
<!-- End Piwik Code -->

<!--Start Google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49024881-1', 'simplebutmagnificent.com');
  ga('send', 'pageview');

</script>
<!--End Google analytics -->

<!--Start Skimlinks -->
	<script type="text/javascript" src="http://s.skimresources.com/js/66028X1498097.skimlinks.js"></script>
<!--End  Skimlinks -->

<div class="container">
	<div class="pull-right">
		<?= Html::a('<i class="fa fa-rss"> </i>', array('rss/feed'), array('class' => 'btn btn-default')); ?>
		<?= Html::a('<i class="fa fa-user"> </i>', array('/user/security/login'), array('class' => 'btn btn-default')); ?>
	</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
