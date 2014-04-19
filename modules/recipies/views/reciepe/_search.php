<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\recipies\models\ReciepeSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reciepe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'creator_id') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'time_deleted') ?>

    <?php // echo $form->field($model, 'time_create') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
