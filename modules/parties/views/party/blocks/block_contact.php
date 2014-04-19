<?php

use yii\helpers\Html;
use yii\helpers\Url;

use kartik\grid\GridView;

/**
 * @var app\modules\parties\models\Party $model
 */

$modalJS = <<<MODALJS
$('#window_contact_add').on('click',myModalWindow);

MODALJS;
$this->registerJs($modalJS);

?>

<div class="navbar navbar-default" role="navigation">
  <?php /*echo Html::a('edit', ['window', 'id' => $model->id, 'win'=>'contact_update','mainid'=>$model->id], [
    'class' => 'btn btn-default navbar-btn navbar-right',
    'id' => 'window_contact_edit'
  ]);*/?>
  &nbsp;
  <?php echo Html::a(\Yii::t('app','Create'), ['window', 'id' => $model->id, 'win'=>'contact_create','mainid'=>$model->id], [
    'class' => 'btn btn-info navbar-btn',
    'id' => 'window_contact_add'
  ]); ?>
</div>


<?php echo GridView::widget([
    'dataProvider' => $model->contactsDP,
    //'filterModel' => $model->contacts->searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],
      'contactName',
      'department',
      'email:email',
      // 'phone',
      'mobile',
      // 'fax',
      // 'user_id',
      // 'system_key',
      // 'system_name',
      // 'system_upate',
      // 'creator_id',
      // 'time_deleted:datetime',
      // 'time_create:datetime',
      [
        'attribute' => 'id',
        'value'=>function ($model,$key,$index) { 
          $actionjs = new yii\web\JsExpression("$('#window_contact_edit".$model->id."').on('click',myModalWindow);");
          $this->registerJs($actionjs);
          return Html::a(\Yii::t('app','edit'), ['window', 'id' => $model->id, 'win'=>'contact_update','mainid'=>$model->party_id], [
            'class' => 'btn btn-info navbar-btn navbar-right',
            'id'    => 'window_contact_edit'.$model->id
          ]);          
        },
        'format'    => 'raw'
      ]
    ],
  ]); ?>
