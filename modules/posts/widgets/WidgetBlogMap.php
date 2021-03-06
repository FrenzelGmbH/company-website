<?php
namespace app\modules\posts\widgets;

use Yii;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use app\modules\posts\models\WidgetConfig;
use app\modules\app\widgets\AdminPortlet;

class WidgetBlogMap extends AdminPortlet
{
	/**
	 * const WIDGET_NAME must be defined for all widgets!
	 */
	const WIDGET_NAME = 'MAPWIDGET';
	
	public $title='Map Widget';
	
	public $module = 0;	
	public $id = 0;

	public function init() {
		parent::init();
	}

	protected function renderContent()
	{
		$query = WidgetConfig::findRelatedRecords(self::WIDGET_NAME, $this->module, $this->id);

		$dpLocations = new ActiveDataProvider(array(
		  'query' => $query,
	  ));
		//here we don't return the view, here we just echo it!
		echo $this->render('@app/modules/posts/widgets/views/_mapwidget',['dpLocations'=>$dpLocations,'module'=>$this->module,'id'=>$this->id]);
	}

}