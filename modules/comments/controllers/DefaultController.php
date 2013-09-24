<?php

namespace app\modules\comments\controllers;

use yii\web\Controller;
use app\modules\comments\models\Comment;
use \yii\data\ActiveDataProvider;

class DefaultController extends Controller
{
	public $layout='/column1';

	public function actionIndex()
	{
		$query = Comment::findRecentComments();

		$dpComments = new ActiveDataProvider(array(
		      'query' => $query,
		      'pagination' => array(
		          'pageSize' => 20,
		      ),
	  	));

		return $this->render('index', array(
			'dpComments' => $dpComments,
		));
	}
}
