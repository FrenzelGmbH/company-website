<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login bg-color-darken opacity-light">
	<h1 class="fg-color-orange"><?php echo Html::encode($this->title); ?></h1>

	<p>Please fill out the following fields to login:</p>

	<?php $form = ActiveForm::begin(array(
		'id' => 'login-form',
		'options' => array('class' => 'form-horizontal'),
		'fieldConfig' => array(
			'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
			'labelOptions' => array('class' => 'col-lg-1 control-label fg-color-white'),
		),
	)); ?>

	<?php echo $form->field($model, 'username'); ?>

	<?php echo $form->field($model, 'password')->passwordInput(); ?>

	<?php echo $form->field($model, 'rememberMe', array(
		'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
	))->checkbox(); ?>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?php echo Html::submitButton('Login', array('class' => 'btn btn-primary')); ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

	<div class="col-lg-offset-1 fg-color-white">
		Für Fragen, Bitte an den Webmaster wenden!
	</div>
</div>
