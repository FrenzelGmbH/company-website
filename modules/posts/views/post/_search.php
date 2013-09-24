<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var app\modules\posts\models\PostSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="post-search">

	<?php $form = ActiveForm::begin(array('method' => 'get')); ?>

		<?php echo $form->field($model, 'id'); ?>
		<?php echo $form->field($model, 'title'); ?>
		<?php echo $form->field($model, 'content'); ?>
		<?php echo $form->field($model, 'tags'); ?>
		<?php echo $form->field($model, 'status'); ?>
		<?php // echo $form->field($model, 'author_id'); ?>
		<?php // echo $form->field($model, 'time_create'); ?>
		<?php // echo $form->field($model, 'time_update'); ?>
		<div class="form-group">
			<?php echo Html::submitButton('Search', array('class' => 'btn btn-primary')); ?>
			<?php echo Html::resetButton('Reset', array('class' => 'btn btn-default')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
