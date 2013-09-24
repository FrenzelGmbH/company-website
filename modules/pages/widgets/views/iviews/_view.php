<?php

use yii\helpers\Html;

?>

<div class="post-box">
  <h4 class="fg-color-orange"><?php echo Html::encode(strtoupper($model->title)); ?></h4>
  <?php echo nl2br(Html::encode($model->content)); ?>
</div>
