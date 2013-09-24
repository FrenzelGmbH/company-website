<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var app\modules\bikes\models\BikeSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="bike-search">

	<?php $form = ActiveForm::begin(array('method' => 'get')); ?>

		<?php echo $form->field($model, 'id'); ?>
		<?php echo $form->field($model, 'Bezeichnung'); ?>
		<?php echo $form->field($model, 'Farbe'); ?>
		<?php echo $form->field($model, 'Kilometer'); ?>
		<?php echo $form->field($model, 'Preis'); ?>
		<?php // echo $form->field($model, 'Leistung'); ?>
		<?php // echo $form->field($model, 'Hubraum'); ?>
		<?php // echo $form->field($model, 'Erstzulassung'); ?>
		<?php // echo $form->field($model, 'Beschreibung'); ?>
		<?php // echo $form->field($model, 'Ausstattung'); ?>
		<?php // echo $form->field($model, 'Antriebsart'); ?>
		<?php // echo $form->field($model, 'Getriebe'); ?>
		<?php // echo $form->field($model, 'deleted')->checkbox(); ?>
		<div class="form-group">
			<?php echo Html::submitButton('Search', array('class' => 'btn btn-primary')); ?>
			<?php echo Html::resetButton('Reset', array('class' => 'btn btn-default')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
