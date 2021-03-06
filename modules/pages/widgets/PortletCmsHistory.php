<?php
namespace app\modules\pages\widgets;

use \Yii;
use yii\helpers\Html;

use app\modules\pages\models\Page;
use app\modules\app\widgets\Portlet;

class PortletCmsHistory extends Portlet
{
	public $title='Verlauf';
	
	public $id = 0;
	public $enableAmdin = false;

	public function init() {
		parent::init();
	}

	protected function renderContent()
	{
		$historics = Page::findOldVersions($this->id)->All();
		echo $this->render('@app/modules/pages/widgets/views/portlet_cms_history',array('historics'=>$historics));
	}
}