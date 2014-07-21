<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SBAdminAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web/sb-admin-v2';
	public $css = [
		'css/sb-admin.css',
		'css/bootstrap.min.css'
	];
	public $js = [
		'js/sb-admin.js',
		'js/plugins/metisMenu/jquery.metisMenu.js',
		'../js/modal_win.js'
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
		'yii\jui\CoreAsset',
		'yii\jui\EffectAsset',
		'frenzelgmbh\appcommon\commonAsset'
	];
}
