<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\recipies\models\ReciepedetailSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reciepedetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'recipie_id') ?>

    <?= $form->field($model, 'incredient_id') ?>

    <?= $form->field($model, 'incredient') ?>

    <?= $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'uom') ?>

    <?php // echo $form->field($model, 'creator_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'time_deleted') ?>

    <?php // echo $form->field($model, 'time_create') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
