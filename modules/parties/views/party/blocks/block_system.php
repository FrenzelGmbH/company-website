<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var app\modules\parties\models\Party $model
 */

?>

<div class="panel">
  <div class="panel-heading">
    <?= Yii::t('app','System Info') ?>
  </div>
    <div class="panel-body">
      <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
          'id',
          'system_key',
          'system_name',
          'system_upate:datetime'
        ],
      ]); ?>
    </div>
</div>
