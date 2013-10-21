<?php

use yii\helpers\Html;
use yii\widgets\Block;

/**
 * @var yii\base\View $this
 * @var app\modules\timetrack\models\Timetable $model
 */

$this->title = 'Create Timetable';
$this->params['breadcrumbs'][] = array('label' => 'Timetables', 'url' => array('index'));
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Block::begin(array('id'=>'sidebar')); ?>

<?php 
  if(class_exists('\app\modules\timetrack\widgets\PortletToolbox')){
    echo \app\modules\timetrack\widgets\PortletToolbox::widget(array(
      'enableAdmin'=>false,
      'menuItems'=>array(
          array('label'=>Yii::t('app','home'),'link'=>Html::url(array('/site/index')),'icon'=>'icon-home'),
          array('label'=>Yii::t('app','overview'),'link'=>Html::url(array('/timetrack/timetrack/index')),'icon'=>'icon-list-alt'),          
      )
    )); 
  }
?>

<?php Block::end(); ?>


<?php Block::begin(array('id'=>'toolbar')); ?>

  <h4>
    <i class="icon-hand-down"></i>
    Hilfe
  </h4>
  
<?php if($model->category == $model::CAT_HOLIDAY): ?>  
  <p>
    Im folgenden Formblatt können Sie das Start- und Enddatum für den gewünschten Urlaubszeitraum selektieren.
    Wieviel Resturlaub Ihnen noch zusteht, sehen Sie in der unten angeführten Urlaubsstatistik. Bitte beachten Sie,
    das <b>je nach Arbeitszeitmodell</b> andere Werte aus Ihrem Urlaubsbestand abgezogen werden. Der <b>tatsächliche SALDO</b>
    wird nach Buchung durch die Personalabteilung bekannt gegeben.
  </p>
  <p>
    Der Urlaubsantrag wird in einem für das Unternehmen definierten Ablaufprozess bearbeitet. Sie werden daher
    in den kommenden Stunden/Tagen über den Verlauf oder benötigte Aktionen <b>per Mail informiert</b>.
  </p>
<?php endif; ?>

<?php Block::end(); ?>

	<h3 class="fg-color-orange"><i class="icon-book"></i> <?= Yii::t('app','Formular'); ?> - <?= Html::encode($model->CategoryAsString); ?></h3>

<div id="page">

	<?= $this->render('_form', array(
		'model' => $model,
	)); ?>

</div>
