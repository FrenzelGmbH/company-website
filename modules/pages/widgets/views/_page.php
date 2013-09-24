<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<?php 
	echo HtmlPurifier::process($model->body);
?>

<?php
  if(Yii::$app->user->isAdmin):
?>

<div class="toolbar">
    &nbsp;<?php echo Html::a('Update', array('/pages/page/update', 'id' => $model->id), array('class' => 'btn btn-success')); ?>
</div>

<?php
  endif;
?>
