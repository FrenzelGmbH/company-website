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
class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/styles.css',
		'css/site.css'
	];
	public $js = [
		'frenzelgmbh/js/script.js',
		'js/css3-mediaqueries.js',
		'js/modal_win.js',
		'js/jquery.form.js',
		//'js/excells/excell_modal_button.js',
		'http://use.edgefonts.net/ubuntu:n3,i3,n4,i4,n5,i5,n7,i7.js'
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
