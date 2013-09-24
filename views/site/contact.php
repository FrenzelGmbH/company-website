<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/**
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\ContactForm $model
 */
$this->title = 'Kontakt';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms">
	<h1 class="fg-color-orange"><?php echo Html::encode($this->title); ?></h1>

	<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

	<div class="alert alert-success">
		Danke schön, dass Sie uns kontaktiert haben! Wir werden uns so schnell wie möglich bei Ihnen melden.
	</div>

	<?php else: ?>

	<p>
		Wenn Sie Fragen zu unseren Angeboten und Leistungen haben, freuen wir uns auf Ihren Kontakt - Danke schön!
	</p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(array('id' => 'contact-form')); ?>
				<?php echo $form->field($model, 'name'); ?>
				<?php echo $form->field($model, 'email'); ?>
				<?php echo $form->field($model, 'subject'); ?>
				<?php echo $form->field($model, 'body')->textArea(array('rows' => 6)); ?>
				<?php echo $form->field($model, 'verifyCode')->widget(Captcha::className(), array(
					'options' => array('class' => 'form-control'),
					'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
				)); ?>
				<div class="form-group">
					<?php echo Html::submitButton('Abschicken', array('class' => 'btn btn-primary')); ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>

	<?php endif; ?>
</div>
