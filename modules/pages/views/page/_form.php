<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\workflow\models\Workflow;

use yiiwymeditor\yiiwymeditor;

/**
 * @var yii\base\View $this
 * @var app\modules\pages\models\Page $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="page-form">

	<?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-lg-4">
		<?php echo $form->field($model,'title')->textInput(array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->field($model,'name')->textInput(array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->field($model,'parent_pages_id')->dropDownList($model::getListOptions()); ?>
		<?php echo $form->field($model,'tags')->textInput(array('size'=>50)); ?>
		<?php echo $form->field($model,'status')->dropDownList(Workflow::getStatusOptions()); ?>
		<?php echo $form->field($model, 'template')->textarea(array('rows' => 6)); ?>
		<?php echo $form->field($model, 'description')->textarea(array('rows' => 6)); ?>
		<?php echo $form->field($model, 'vars')->textarea(array('rows' => 6)); ?>
		<?php echo $form->field($model, 'ord')->textInput(); ?>
		<?php echo $form->field($model, 'special')->textInput(); ?>
		<?php echo $form->field($model, 'date_associated')->textInput(); ?>
		<?php echo $form->field($model, 'category')->textInput(array('maxlength' => 64)); ?>
	</div>
	<div class="col-lg-8">
		<?php echo yiiwymeditor::widget(array(
			'model'=>$model,
			'attribute'=>'body',
			'clientOptions'=>array(
				'toolbar' => 'basic',
				'height' => '500px',
				'filebrowserBrowseUrl' => Html::url(array('/pages/page/filemanager')),
				'filebrowserImageBrowseUrl' => Html::url(array('/pages/page/filemanager','mode'=>'image')),
			),
			'inputOptions'=>array(
				'size'=>'2',
			)
		));?>
	</div>
</div>
		
		<div class="form-group">
			<?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => 'btn btn-primary')); ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
