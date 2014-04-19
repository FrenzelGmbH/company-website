<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\recipies\models\Incredient $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="incredient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cup_factor')->textInput() ?>

    <?= $form->field($model, 'creator_id')->textInput() ?>

    <?= $form->field($model, 'time_deleted')->textInput() ?>

    <?= $form->field($model, 'time_create')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
