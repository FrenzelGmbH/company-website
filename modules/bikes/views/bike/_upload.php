<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var app\modules\bikes\models\BikeSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="bike-upload">

	<?php $form = ActiveForm::begin(array(
			'method' => 'post',
			'options' => array(
				'enctype'=>'multipart/form-data'
			)
	)); ?>

		<?php //echo $form->field($uploadModel, 'file'); ?>
		
		<div class="form-group">
			<?php echo Html::submitButton('Upload', array('class' => 'btn btn-success')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
