<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var app\modules\bikes\models\Bike $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="bike-form">

	<?php $form = ActiveForm::begin(); ?>

		<?php echo $form->field($model, 'Bezeichnung')->textInput(array('maxlength' => 100)); ?>

		<?php echo $form->field($model, 'Erstzulassung')->textInput(array('maxlength' => 10)); ?>

		<?php echo $form->field($model, 'Kilometer')->textInput(); ?>

		<?php echo $form->field($model, 'Preis')->textInput(); ?>

		<?php echo $form->field($model, 'Leistung')->textInput(); ?>

		<?php echo $form->field($model, 'Hubraum')->textInput(); ?>

		<?php echo $form->field($model, 'Beschreibung')->textarea(array('rows' => 6)); ?>

		<?php echo $form->field($model, 'Ausstattung')->textarea(array('rows' => 6)); ?>

		<?php echo $form->field($model, 'deleted')->checkbox(); ?>

		<?php echo $form->field($model, 'Farbe')->textInput(array('maxlength' => 100)); ?>

		<?php echo $form->field($model, 'Antriebsart')->textInput(array('maxlength' => 100)); ?>

		<?php echo $form->field($model, 'Getriebe')->textInput(array('maxlength' => 100)); ?>

		<div class="form-group">
			<?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => 'btn btn-primary')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

<?php echo $this->render('_upload', array('uploadModel' => $uploadModel)); ?>
