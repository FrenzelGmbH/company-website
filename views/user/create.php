<?php

use yii\helpers\Html;

/**
 * @var yii\base\View $this
 * @var app\models\User $model
 */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => array('index'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-wsp">

	<h1><?php echo Html::encode($this->title); ?></h1>

	<?php echo $this->render('_form', array(
		'model' => $model,
	)); ?>

</div>
