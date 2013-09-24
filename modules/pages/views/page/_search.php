<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var app\modules\pages\models\PageForm $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="page-search">

	<?php $form = ActiveForm::begin(array('method' => 'get')); ?>

		<?php echo $form->field($model, 'id'); ?>
		<?php echo $form->field($model, 'name'); ?>
		<?php //echo $form->field($model, 'body'); ?>
		<?php //echo $form->field($model, 'parent_pages_id'); ?>
		<?php echo $form->field($model, 'ord'); ?>
		<?php // echo $form->field($model, 'time_create'); ?>
		<?php // echo $form->field($model, 'time_update'); ?>
		<?php // echo $form->field($model, 'special'); ?>
		<?php // echo $form->field($model, 'title'); ?>
		<?php echo $form->field($model, 'template'); ?>
		<?php // echo $form->field($model, 'category'); ?>
		<?php // echo $form->field($model, 'tags'); ?>
		<?php // echo $form->field($model, 'description'); ?>
		<?php // echo $form->field($model, 'date_associated'); ?>
		<?php // echo $form->field($model, 'vars'); ?>
		<?php // echo $form->field($model, 'status'); ?>
		<div class="form-group">
			<?php echo Html::submitButton('Search', array('class' => 'btn btn-primary')); ?>
			<?php echo Html::resetButton('Reset', array('class' => 'btn btn-default')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
