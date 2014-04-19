<?php

namespace app\modules\app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class AppController extends Controller
{

  /**
   * [$layout description]
   * @var string
   */
  public $layout = '/column2';

  /**
   * $adminlayout for the modules
   * @var string
   */
  const adminlayout = '/column2_admin';
  
  /**
   * [$mainlayout description]
   * @var string
   */
  CONST mainlayout = '/main';

  /**
   * [init description]
   * @return [type] [description]
   */
  public function init()
  {
    parent::init();

    if (isset($_POST['_lang']))
    {
        Yii::$app->language = $_POST['_lang'];
        Yii::$app->session['_lang'] = Yii::$app->language;
    }
    else if (isset(Yii::$app->session['_lang']))
    {
        Yii::$app->language = Yii::$app->session['_lang'];
    } 
  }

}
