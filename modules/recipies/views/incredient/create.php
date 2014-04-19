<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\recipies\models\Incredient $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Incredient',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Incredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incredient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
