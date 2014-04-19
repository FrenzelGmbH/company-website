<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\recipies\models\ReciepedetailSearch $searchModel
 */

$this->title = Yii::t('app', 'Reciepedetails');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reciepedetail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Reciepedetail',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'recipie_id',
            'incredient_id',
            'incredient',
            'amount',
            // 'uom',
            // 'creator_id',
            // 'status',
            // 'time_deleted:datetime',
            // 'time_create:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
