<?php
namespace app\modules\posts\widgets;

use Yii;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use app\modules\posts\models\WidgetConfig;
use app\modules\app\widgets\Portlet;

class WidgetBlogMapRender extends Portlet
{
	/**
	 * const WIDGET_NAME must be defined for all widgets!
	 */
	const WIDGET_NAME = 'MAPWIDGET';
	
	public $module = 0;	
	public $id = 0;

	public function init() {
		parent::init();
	}

	protected function renderContent()
	{
		$dpLocations = WidgetConfig::findRelatedModels(self::WIDGET_NAME, $this->module, $this->id);

	  if(!is_null($dpLocations))
	  {
			//here we don't return the view, here we just echo it!
			echo $this->render('@app/modules/posts/widgets/views/_mapwidget_renderer',['dpLocations'=>$dpLocations]);
		}
		else
		{
			echo "";
		}
	}

}