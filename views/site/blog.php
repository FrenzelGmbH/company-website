<?php

use yii\helpers\Html;
use philippfrenzel\yii2masonry;
use yii\widgets\Block;
use kartik\icons\Icon;
use philippfrenzel\yii2instafeed;

/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('app','SimpleButMagnificent - Fashion, Food, Trends, Lifestyle') . ' '.$linkedby;
?>

<?php Block::begin(array('id'=>'sidebar')); ?>

<div class="lookover">
	<img src="img/frontimage1.jpg" alt="Cassandra" class="img-responsive"></img>
</div>

<fieldset class="fieldbodysc bg_white">
	<?php
		if(class_exists('app\modules\posts\widgets\PortletPostsSearch')){
			echo app\modules\posts\widgets\PortletPostsSearch::widget(array(
        'maxResults'=> 5,
        'title' => NULL
      ));
		}
	?>
</fieldset>

<fieldset class="fieldbodywg">
	<?php
		if(class_exists('app\modules\categories\widgets\CategoriesCloud')){
			echo app\modules\categories\widgets\CategoriesCloud::widget(array(
        'module' 	   => app\modules\workflow\models\Workflow::MODULE_BLOG,
        'linkclass'  => 'c_black middle-font'
      ));
		}
	?>
</fieldset>

<fieldset class="fieldbody">
	<div class="social bg_mint_ddd">
		<a href="http://www.pinterest.com/SimpleButMagnif/ target="_blank">PINTEREST</a>
	</div>
	<div class="social bg_mint_dd">
		<a href="https://www.facebook.com/SimpleButMagnificent" target="_blank">FACEBOOK</a>
	</div>
	<div class="social bg_mint_d">
		INSTAGRAM
	</div>
	<div class="social bg_mint">
		TWITTER
	</div>
</fieldset>

<fieldset class="fieldbodywg">
	<a data-pin-do="embedUser" href="http://www.pinterest.com/SimpleButMagnif/" data-pin-scale-width="220" data-pin-scale-height="240" data-pin-board-width="230">Visit SimpleButMagnificent on Pinterest.</a>
</fieldset>

<fieldset class="fieldbodywg" style="align:center">
	<?php 
		echo philippfrenzel\yii2instafeed\yii2instafeed::widget([
		    'clientOptions' => [
						'target' => 'instafeedtarget',
		        'get' => 'user',
		        'userId' => new yii\web\JsExpression('1063429752'),
		        'accessToken' => '1063429752.467ede5.68ad0589ee1244c0a938b23f116180d6',
		        'limit' => 4,
		        'sortBy' => 'most-recent',
		        'links' => false,
		        'resolution' => 'thumbnail',
		        'mock' => false,
		        'useHttp' => false,
		        'template' => '<a href="{{link}}"><img src="{{image}}" width="115px" class="instagram pull-left"/></a>'
		    ]    
		]);
	?>
	<div id="instafeedtarget"></div>
</fieldset>

	<?php /* $this->render('blocks/block_system', [
		'model' => $model,
	]);*/ ?>

<?php Block::end(); ?>


<div class="site-index">

<div class="section">
	<?php 
	  if(class_exists('app\modules\posts\widgets\PortletPostsStyled')){
	    echo app\modules\posts\widgets\PortletPostsStyled::widget([
	    'title'=>NULL,
    		'limit'=>4,
			]); 
	  }
	?>
</div>

</div>
