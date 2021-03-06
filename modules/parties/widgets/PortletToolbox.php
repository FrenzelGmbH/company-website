<?php
namespace app\modules\parties\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class PortletToolbox extends Portlet
{
	public $title=NULL;

	/**
	 * the menu items containing label and action for the displayed action
	 * @var array
	 */
	public $menuItems = NULL;
	
	/**
	 * @var string the CSS class for the portlet title tag. Defaults to 'portlet-title'.
	 */
	public $titleCssClass='fg-color-black';

	/**
	 * @var string the CSS class for the portlet title tag. Defaults to 'portlet-content'.
	 */
	public $contentCssClass='fg-color-black';

	public $htmlOptions=array();

	public function init() {
		parent::init();
	}

	protected function renderContent()
	{
		if($this->menuItems==null){
			$this->menuItems = array();
			$this->menuItems[] = array('label'=>Yii::t('app','overview'),'link'=>Url::to(array('/timetrack/timetrack/index')),'icon'=>'icon-list-alt');
		}

		//here we don't return the view, here we just echo it!
		echo $this->render('@app/modules/timetrack/widgets/views/_toolbox',array('menuItems'=>$this->menuItems));
	}

	/**
	 * Renders the decoration for the portlet.
	 * The default implementation will render the title if it is set.
	 */
	protected function renderDecoration()
	{
		if($this->title!==null)
		{
			$this->title = Yii::t('app',$this->title);
			echo "<div class='panel-heading'><h3 class=\"{$this->titleCssClass}\"><i class='icon-info'></i> {$this->title}</h3>\n</div>\n";
		}
	}
}