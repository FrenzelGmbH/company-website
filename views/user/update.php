<?php

use yii\helpers\Html;

/**
 * @var yii\base\View $this
 * @var app\models\User $model
 */

$this->title = 'Update User: ' . $model->name;
$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => array('index'));
$this->params['breadcrumbs'][] = array('label' => $model->name, 'url' => array('view', 'id' => $model->id));
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-wsp">

	<h1><?php echo Html::encode($this->title); ?></h1>

	<?php echo $this->render('_form', array(
		'model' => $model,
	)); ?>

</div>
