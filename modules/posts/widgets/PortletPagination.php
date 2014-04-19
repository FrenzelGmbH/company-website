<?php
namespace app\modules\posts\widgets;

use Yii;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use app\modules\posts\models\WidgetConfig;
use app\modules\app\widgets\Portlet;

class PortletPagination extends Portlet
{
	/**
	 * [$post description]
	 * @var integer
	 */
	public $model = NULL;

	public function init() {
		parent::init();
	}

	protected function renderContent()
	{
		//here we don't return the view, here we just echo it!
		echo $this->render('@app/modules/posts/widgets/views/_post_pagination',['model'=>$this->model]);
	}

}