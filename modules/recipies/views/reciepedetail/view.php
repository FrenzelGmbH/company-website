<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\recipies\models\Reciepedetail $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reciepedetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reciepedetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'recipie_id',
            'incredient_id',
            'incredient',
            'amount',
            'uom',
            'creator_id',
            'status',
            'time_deleted:datetime',
            'time_create:datetime',
        ],
    ]) ?>

</div>
