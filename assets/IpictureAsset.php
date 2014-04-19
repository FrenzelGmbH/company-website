<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * @author Philipp Frenzel <philipp@frenzel.net>
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Original Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class IpictureAsset extends AssetBundle
{
	public $basePath = '@webroot/ipicture';
	public $baseUrl = '@web/ipicture';
	public $css = [
		'css/iPicture.css'		
	];
	public $js = [
		'js/jquery.ipicture.js'
		//'js/zepto.ipicture.js'
	];
	public $depends = [
	];
}
