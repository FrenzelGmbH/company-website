<?php

use \yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

use app\modules\workflow\models\Workflow;

$this->assetBundles['yii\web\YiiAsset'] = new yii\web\AssetBundle;
$this->assetBundles['yii\web\JqueryAsset'] = new yii\web\AssetBundle;
$this->assetBundles['yii\web\BootstrapAsset'] = new yii\web\AssetBundle;


$uniqueIdEDIT = 'TaskLogBatch'.$model->task_table.'_'.$model->task_id.'EDIT';

$formsubmitJS = <<<FORMJS
$('#task-form-update').submit(function(){
	$(':submit', this).click(function() {
		var data = $("#task-form-update").serialize();
		$.ajax({
	   		type: 'POST',
	   		url: '$requestUrl',
	   		data: data,
			success: function(data){
				$('#applicationModal').modal('hide');
				$('#$uniqueIdEDIT > span > i').html(data.newCount);	        
	        },
	   		error: function(data) {
	         	alert("Error occured. Please try again");
	         	alert(data.info);	         	
	    	},
		  	dataType:'json'
	  	});
		return false;
	});
});
FORMJS;
$this->registerJs($formsubmitJS);
/*
$('#PortlettaskLogTable table tbody tr').each(function(index, domEle){
	var keyValue = $(domEle).attr('data-key');
	if(keyValue == data.id){
		$(domEle).find('td:first-child').html(data.content);
	}
});
*/
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title><?= Html::encode($this->title); ?></title>
	<?php $this->head(); ?>
</head>
<body>
	<?php $this->beginBody(); ?>

<div id="page">
	
<?php $form = ActiveForm::begin(array(
	'enableAjaxValidation' => false,
	'options' => array(
		'class' => ActiveField::className(),
		'id' => 'task-form-update',
    ),
)); ?>

	<?= $form->field($model, 'content')->textArea(array('rows'=>3)); ?>
	<?= $form->field($model, 'status')->dropDownList(Workflow::getStatusOptions()); ?>
	<div class="form-group">
		<?= Html::submitButton('<i class="icon-pencil"></i> '.$model->isNewRecord?Yii::t('app','Create'):Yii::t('app','Update'), array('class'=>'btn btn-success fg-color-white')); ?>
	</div>

	<?= $form->field($model, 'creator_id')->textInput(array('readonly' => 'true')); ?>
	<?= $form->field($model, 'time_create')->textInput(array('readonly' => 'true')); ?>
	<?= $form->field($model, 'task_table')->textInput(array('readonly' => 'true')); ?>
	<?= $form->field($model, 'task_id')->textInput(array('readonly' => 'true')); ?>

<?php ActiveForm::end(); ?>

</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
