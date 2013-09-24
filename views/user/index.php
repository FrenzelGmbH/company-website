<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\base\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\UserForm $searchModel
 */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmodule-wsp">

	<h1><?php echo Html::encode($this->title); ?></h1>

	<?php echo $this->render('_search', array('model' => $searchModel)); ?>

	<hr>

	<div>
		<?php echo Html::a('Create User', array('create'), array('class' => 'btn btn-danger')); ?>
	</div>

	<?php echo GridView::widget(array(
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => array(
			'id',
			'username',
			'password',
			'email:email',
			'role',
			// 'prename',
			// 'name',
			// 'phone',
			// 'mobile',
			// 'fax',
			// 'messanger',
			// 'parent_user_id',
			// 'backup_user_id',
			// 'time_create:datetime',
			// 'time_update:datetime',
			// 'time_login:datetime',
			// 'date_entry',
			// 'date_exit',
			// 'no_employee',
		),
	)); ?>

</div>
