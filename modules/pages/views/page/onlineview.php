<?php

use yii\helpers\Html;
use yii\widgets\Block;
use yii\helpers\HtmlPurifier;

/**
 * @var yii\base\View $this
 * @var app\modules\pages\models\Page $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = array('label' => 'Pages', 'url' => array('index'));
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
	if(Yii::$app->user->isAdmin):
?>

<div class="toolbar">
		&nbsp;<?php echo Html::a('Update', array('update', 'id' => $model->id), array('class' => 'btn btn-info pull-right')); ?>
		&nbsp;<?php echo Html::a('Delete', array('delete', 'id' => $model->id), array('class' => 'btn btn-danger pull-right')); ?>
</div>

<?php
	endif;
?>

<?php Block::begin(array('id'=>'sidebar')); ?>	
	
	<?php
		echo app\modules\pages\widgets\PortletPageNavigationSub::widget(array(
    		'id'=>$model->id,
		));
	?>

<?php Block::end(); ?>


	<h1 class="fg-color-orange"><?php echo Html::encode($this->title); ?></h1>

	<?php 
		echo HtmlPurifier::process($model->body);
	?>
