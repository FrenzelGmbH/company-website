<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\base\View $this
 * @var app\models\User $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => array('index'));
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
			'username',
			'password',
			'email:email',
			'role',
			'prename',
			'name',
			'phone',
			'mobile',
			'fax',
			'messanger',
			'parent_user_id',
			'backup_user_id',
			'time_create:datetime',
			'time_update:datetime',
			'time_login:datetime',
			'date_entry',
			'date_exit',
			'no_employee',
		),
	)); ?>

</div>
