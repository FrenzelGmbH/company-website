<?php

namespace app\modules\bikes;


class Bike extends \yii\base\Module
{
  /**
  * @var public defaultRoute holding the controller name which will be called by default
  */
  public $defaultRoute = 'bike';

  /**
  * @var public $controllerNamespace holing the namespace of the controller
  */
	public $controllerNamespace = 'app\modules\bikes\controllers';

	public function init()
	{
		parent::init();

		// custom initialization code goes here
	}
}
