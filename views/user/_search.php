<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var app\models\UserForm $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-search">

	<?php $form = ActiveForm::begin(array('method' => 'get')); ?>

		<?php echo $form->field($model, 'id'); ?>
		<?php echo $form->field($model, 'username'); ?>
		<?php echo $form->field($model, 'password'); ?>
		<?php echo $form->field($model, 'email'); ?>
		<?php echo $form->field($model, 'role'); ?>
		<?php // echo $form->field($model, 'prename'); ?>
		<?php // echo $form->field($model, 'name'); ?>
		<?php // echo $form->field($model, 'phone'); ?>
		<?php // echo $form->field($model, 'mobile'); ?>
		<?php // echo $form->field($model, 'fax'); ?>
		<?php // echo $form->field($model, 'messanger'); ?>
		<?php // echo $form->field($model, 'parent_user_id'); ?>
		<?php // echo $form->field($model, 'backup_user_id'); ?>
		<?php // echo $form->field($model, 'time_create'); ?>
		<?php // echo $form->field($model, 'time_update'); ?>
		<?php // echo $form->field($model, 'time_login'); ?>
		<?php // echo $form->field($model, 'date_entry'); ?>
		<?php // echo $form->field($model, 'date_exit'); ?>
		<?php // echo $form->field($model, 'no_employee'); ?>
		<div class="form-group">
			<?php echo Html::submitButton('Search', array('class' => 'btn btn-primary')); ?>
			<?php echo Html::resetButton('Reset', array('class' => 'btn btn-default')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
