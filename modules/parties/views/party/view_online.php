<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\Block;
use kartik\widgets\SideNav;

use yii\bootstrap\Tabs;
use yii\bootstrap\Modal;

/**
 * @var yii\web\View $this
 * @var app\modules\parties\models\Party $model
 */

$this->title = Html::encode($model->organisationName);
$this->params['breadcrumbs'][] = ['label' => 'Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$modalJS = <<<MODALJS
$('#window_party_edit').on('click',myModalWindow);
$.fn.modal.Constructor.prototype.enforceFocus = function() {};

MODALJS;
$this->registerJs($modalJS);

?>

<?php 
	Modal::begin([
	  'id'=>'myModalWindow',
	  'header' => '<h4>Loading</h4>',
	  'size' => 'modal-lg',
	]);
	echo 'one moment';
	Modal::end();
?>

<?php Block::begin(array('id'=>'sidebar')); ?>

<?php 

    $sideMenu = array();
    $sideMenu[] = array('icon'=>'home','label'=>Yii::t('app','Home'),'url'=>Url::to(array('/site/index')));
    $sideMenu[] = array('icon'=>'arrow-left','label'=>Yii::t('app','Overview'),'url'=>Url::to(array('/parties/party/index')));
   
    echo SideNav::widget([
      'type' => SideNav::TYPE_DEFAULT,
      'heading' => 'Options',
      'items' => $sideMenu
    ]);

  ?>


<?= $this->render('blocks/block_system', [
		'model' => $model,
	]); ?>

<?php Block::end(); ?>

<div class="workbench">	

	<h1 class="page-header"><?= Html::encode($this->title) ?></h1>	

  <div class="pull-right">
    <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
      'data-method' => 'post',
    ]); ?>
  </div>


<?php echo Tabs::widget([
 'items' => [
	 [
		 'label' => 'General',
		 'content' => $this->render('blocks/block_party', ['model' => $model]),
		 'active' => true
	 ]	 
	]
]);
?>


<?php echo Tabs::widget([
 'items' => [
	 [
		 'label' => 'Contacts',
		 'content' => $this->render('blocks/block_contact', ['model' => $model]),
		 'active' => true
	 ],
	 [
		 'label' => 'Adresses',
		 'content' => $this->render('blocks/block_address', ['model' => $model]),		 
	 ]	 
	]
]);
?>

<?php

//initialise all waypoints
$mycenter = 0;
$locations = array();
foreach($model->addresses AS $address){
  if($mycenter == 0)
  {
    $center = new dosamigos\leaflet\types\LatLng(['lat' => $address->no_latitude, 'lng' => $address->no_longitude]);
  }
  $locations[] = new dosamigos\leaflet\types\LatLng(['lat' => $address->no_latitude, 'lng' => $address->no_longitude]);
  $mycenter++;
}

if($mycenter>0)
{ 

  $layer = new dosamigos\leaflet\layers\TileLayer([
       //'urlTemplate' => 'http://{s}.tile.cloudmade.com/c78ff4e5762545188f82a9a4cd552d54/997/256/{z}/{x}/{y}.png',
       'urlTemplate' => 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
       'map' => 'TestMap',
       'clientOptions' =>[
          'attribution' => 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
       ]
  ]);

  $leafLet = new dosamigos\leaflet\LeafLet([
    'center' => $center,
    'zoom' => 13,
    'TileLayer' => $layer,
    'name' => 'TestMap'
  ]);

  // Initialize plugin
  $makimarkers = new dosamigos\leaflet\plugins\makimarker\MakiMarker(['name' => 'makimarker']);

  $leafLet->installPlugin($makimarkers);

  //var_dump($leafLet->plugins);exit;

  // generate icon through its icon
  $marker = new dosamigos\leaflet\layers\Marker([
      'latLng' => $center,
      'icon' => $leafLet->plugins->makimarker->make("cafe",['color' => "#b0b", 'size' => "m"]),
      'popupContent' => 'Hey! I am a marker'
  ]);

  $leafLet->addLayer($marker);
  

  echo dosamigos\leaflet\widgets\Map::widget(['leafLet' => $leafLet,'options' => ['style' => 'height: 400px']]);

}

?>

</div>
