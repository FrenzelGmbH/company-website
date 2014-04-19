<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;

use yii\widgets\Breadcrumbs;
use app\assets\SBAdminAsset;

use kartik\icons\Icon;
use philippfrenzel\yii2tooltipster\yii2tooltipster;
use app\modules\app\widgets\wgtLanguage;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
SBAdminAsset::register($this);
Icon::map($this);
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<?= yii2tooltipster::widget(['options'=>['class'=>'.tipster']]); ?>

<?php 
  Modal::begin([
    'id'=>'applicationModal',
    'header' => '<h4>Loading</h4>',
    'size' => 'modal-lg',
  ]);
  echo 'one moment';
  Modal::end();
?>

<div id="wrapper">
    
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
        'brandLabel' => 'cassandra',
        'brandUrl' => Yii::$app->homeUrl,
        'renderInnerContainer' => false,
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
        echo wgtLanguage::widget();   
      ?>

      <?php
      echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
          ['label' => Icon::show('home', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Home'), 'url' => ['/site/index']],
          ['label' => Icon::show('sign-in', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Login'), 'url' => ['/site/login'], 'visible' => Yii::$app->user->isGuest],
          ['label' => Icon::show('pencil', ['class'=>'fa'], Icon::FA) . ' ' . Yii::t('app','Registration'), 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
          is_array($MenuItems)?$MenuItems:'',
          ['label' => Icon::show('sign-out', ['class'=>'fa'], Icon::FA) . ' ' .Yii::t('app','Logout'), 'url' => ['/user/security/logout'], 'visible' => !Yii::$app->user->isGuest, 'linkOptions' => ['data-method' => 'post']],       
        ],
      ]);
      NavBar::end();
    ?>

      <?= $content ?>     

      <div class="panel-footer">
        <div class="container">
          <p class="pull-left">&copy; simplebutmagnificent.com <?= date('Y') ?></p>
          <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
      </div>

</div> <!-- end of wrapper /-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
