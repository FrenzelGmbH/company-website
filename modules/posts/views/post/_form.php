<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\workflow\models\Workflow;

/**
 * @var yii\base\View $this
 * @var app\modules\posts\models\Post $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="post-form">

	<?php $form = ActiveForm::begin(); ?>

		<?php echo $form->field($model, 'title')->textInput(array('maxlength' => 128)); ?>

		<?php echo $form->field($model, 'content')->textarea(array('rows' => 6)); ?>

		<?php echo $form->field($model,'status')->dropDownList(Workflow::getStatusOptions()); ?>

		<?php echo $form->field($model, 'tags')->textarea(array('rows' => 6)); ?>

		<div class="form-group">
			<?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => 'btn btn-primary')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
