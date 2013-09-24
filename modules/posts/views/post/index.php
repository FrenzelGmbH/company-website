<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/**
 * @var yii\base\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\posts\models\PostSearch $searchModel
 */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-wsp">

	<h1><?php echo Html::encode($this->title); ?></h1>

	<?php echo $this->render('_search', array('model' => $searchModel)); ?>

	<hr>

	<div>
		<?php echo Html::a('Create Post', array('create'), array('class' => 'btn btn-danger')); ?>
	</div>

	<?php echo GridView::widget(array(
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => array(
			'id',
			'title',
			'content:ntext',
			'tags:ntext',
			'status',
			// 'author_id',
			// 'time_create:datetime',
			// 'time_update:datetime',
			array(
				'class' => DataColumn::className(),
				'content'=>function($data, $row) {
					$html = Html::a(NULL, array("/posts/post/update", "id"=>$data->id), array('class' => 'edit icon icon-edit', "id"=>$data->id));
					$html .= ' | ';
					$html .= Html::a(NULL, array("/posts/post/delete", "id"=>$data->id), array('class'=>'delete icon icon-trash'));
					return $html;
				}
			),
		),
	)); ?>

</div>
