<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\recipies\models\Reciepedetail $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reciepedetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipie_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'creator_id')->textInput() ?>

    <?= $form->field($model, 'incredient_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'uom')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'time_deleted')->textInput() ?>

    <?= $form->field($model, 'time_create')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'incredient')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
