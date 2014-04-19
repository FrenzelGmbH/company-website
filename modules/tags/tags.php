<?php

namespace app\modules\tags;

use \yii\base\Module;

/**
 * MODULE :: Tags
 * The default controller, that will be addressed when someone tries to use this module
 * The default action is index
 */

class Tags extends Module
{

  /**
  * @var public defaultRoute holding the controller name which will be called by default
  */
  public $defaultRoute = 'default';

  /**
  * @var public $controllerNamespace holing the namespace of the controller
  */
	public $controllerNamespace = 'app\modules\tags\controllers';

	public function init()
	{
		parent::init();

		// custom initialization code goes here
	}
}
