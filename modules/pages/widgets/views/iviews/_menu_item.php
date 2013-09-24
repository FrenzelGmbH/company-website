<?php

use yii\helpers\Html;

?>

<a href="<?php echo Html::url(array('/pages/page/onlineview', 'id' => $model->id)); ?>" class="list-group-item fg-color-orange"><i class="icon-arrow-right"></i> <?php echo Html::encode(strtoupper($model->title)); ?></a>
