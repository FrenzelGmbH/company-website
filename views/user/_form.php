<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var app\models\User $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin(); ?>

		<?php echo $form->field($model, 'username')->textInput(array('maxlength' => 100)); ?>

		<?php echo $form->field($model, 'password')->passwordInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'email')->textInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'role')->textInput(); ?>

		<?php echo $form->field($model, 'parent_user_id')->textInput(); ?>

		<?php echo $form->field($model, 'backup_user_id')->textInput(); ?>

		<?php echo $form->field($model, 'time_create')->textInput(); ?>

		<?php echo $form->field($model, 'time_update')->textInput(); ?>

		<?php echo $form->field($model, 'time_login')->textInput(); ?>

		<?php echo $form->field($model, 'date_entry')->textInput(); ?>

		<?php echo $form->field($model, 'date_exit')->textInput(); ?>

		<?php echo $form->field($model, 'prename')->textInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'name')->textInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'phone')->textInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'mobile')->textInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'fax')->textInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'messanger')->textInput(array('maxlength' => 255)); ?>

		<?php echo $form->field($model, 'no_employee')->textInput(array('maxlength' => 25)); ?>

		<div class="form-group">
			<?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => 'btn btn-primary')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
