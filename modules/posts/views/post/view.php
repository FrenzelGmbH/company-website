<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\base\View $this
 * @var app\modules\posts\models\Post $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = array('label' => 'Posts', 'url' => array('index'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-wsp">

	<h1><?php echo Html::encode($this->title); ?></h1>

	<div>
		<?php echo Html::a('Update', array('update', 'id' => $model->id), array('class' => 'btn btn-danger')); ?>
		<?php echo Html::a('Delete', array('delete', 'id' => $model->id), array('class' => 'btn btn-danger')); ?>
	</div>

	<?php echo DetailView::widget(array(
		'model' => $model,
		'attributes' => array(
			'id',
			'title',
			'content:ntext',
			'tags:ntext',
			'status',
			'author_id',
			'time_create:datetime',
			'time_update:datetime',
		),
	)); ?>

</div>
