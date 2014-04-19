<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\widgets\SideNav;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\parties\models\PartySearch $searchModel
 */

$this->title = Yii::t('app', 'Manage Parties');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php yii\widgets\Block::begin(array('id'=>'sidebar')); ?>

    <?php 

    $sideMenu = array();
    $sideMenu[] = array('icon'=>'home','label'=>Yii::t('app','Home'),'url'=>Url::to(array('/site/index')));
    $sideMenu[] = array('icon'=>'plus','label'=>Yii::t('app','New Party'),'url'=>Url::to(array('/parties/party/create')));
   
    echo SideNav::widget([
      'type' => SideNav::TYPE_DEFAULT,
      'heading' => 'Options',
      'items' => $sideMenu
    ]);

  ?>

<?php yii\widgets\Block::end(); ?>

<div class="workbench">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'organisationName',
            'partyNote:ntext',
            //'taxNumber',
            //'registrationNumber',
            // 'registrationCountryCode',
            // 'party_type',
            // 'system_key',
            'system_name',
            // 'system_upate',
            // 'creator_id',
            // 'time_deleted:datetime',
            'time_create:datetime',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Parties</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Party', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
    ]); ?>

</div>
