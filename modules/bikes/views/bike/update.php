<?php

use yii\helpers\Html;

/**
 * @var yii\base\View $this
 * @var app\modules\bikes\models\Bike $model
 */

$this->title = 'Update Bike: ' . $model->id;
$this->params['breadcrumbs'][] = array('label' => 'Bikes', 'url' => array('index'));
$this->params['breadcrumbs'][] = array('label' => $model->id, 'url' => array('view', 'id' => $model->id));
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-wsp">

	<h1><?php echo Html::encode($this->title); ?></h1>

	<?php echo $this->render('_form', array(
		'model' => $model,
	)); ?>

</div>
