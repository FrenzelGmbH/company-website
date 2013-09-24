<?php

use yii\helpers\Html;

?>

<div class="post-box">
  <h4 class="fg-color-orange"><?php echo Html::encode(strtoupper($model->title)); ?>  <small><?php echo date('Y-m-d h:m',$model->time_create); ?></small></h4>
  <?php echo nl2br(Html::encode($model->content)); ?>
</div>
