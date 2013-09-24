<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\base\View $this
 * @var app\modules\bikes\models\Bike $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = array('label' => 'Bikes', 'url' => array('index'));
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
			'Bezeichnung',
			'Farbe',
			'Kilometer',
			'Preis',
			'Leistung',
			'Hubraum',
			'Erstzulassung',
			'Beschreibung:ntext',
			'Ausstattung:ntext',
			'Antriebsart',
			'Getriebe',
			'deleted:boolean',
		),
	)); ?>

</div>
