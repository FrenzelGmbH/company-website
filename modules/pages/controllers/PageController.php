<?php

namespace app\modules\pages\controllers;

use app\modules\pages\models\Page;
use app\modules\pages\models\PageForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{

	public $layout = "column1";

	public function behaviors() {
		return array(
			'AccessControl' => array(
				'class' => '\yii\web\AccessControl',
				'rules' => array(
					/*array(
						'allow'=>true, 
						'roles'=>array('@'), // allow authenticated users to access all actions
					),*/
					array(
						'allow'=>true
					),
				)
			)
		);
	}

	/**
	 * Actions by class
	 * @return array
	 */
	public function actions()
	{
		return array(
			'connector' => array(
				'class' => 'yii2elfinder\ConnectorAction',
				'clientOptions'=>array(
					'locale' => '',	
					'roots'  => array(
				        array(
				        	'rootAlias' => 'CMS Bilder',
				            'driver' => 'LocalFileSystem',
				            'path'   => dirname(__DIR__).'/../../web/filemanager/',
				            'URL'    => '',				            
				            'mimeDetect' => 'internal',
				            'dotFiles' => false,
				            'uploadAllow' => array('image'),
							'accessControl' => 'access',
							'perms'=>array(
								 '/^$/' => array('read'=>true, 'write'=>true,  'rm'=>false),
								 '/^gallery\/pictures$/' => array('read'=>true, 'write'=>true,  'rm'=>false),
							)
				        )
				    ) 	
				)
			)
		);
	}

	/**
	 * Lists all Page models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new PageForm;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', array(
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		));
	}

	/**
	 * Displays a single Page model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', array(
			'model' => $this->findModel($id),
		));
	}

	/**
	 * Displays a single Page model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionOnlineview($id)
	{
		$model = $this->findModel($id);
		if(strlen($model->template)>0)
			$this->layout = $model->template;

		return $this->render('onlineview', array(
			'model' => $model,
		));
	}

	/**
	* renders the file manager for the content management system
	* @return  mixed
	*/
	public function actionFilemanager(){
		//will not use any layout
		$this->layout = 'column1';
		return $this->render('elfinder');
	}

	/**
	 * Creates a new Page model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Page;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(array('view', 'id' => $model->id));
		} else {
			return $this->render('create', array(
				'model' => $model,
			));
		}
	}

	/**
	 * Updates an existing Page model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(array('view', 'id' => $model->id));
		} else {
			return $this->render('update', array(
				'model' => $model,
			));
		}
	}

	/**
	 * Deletes an existing Page model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(array('index'));
	}

	/**
	 * Finds the Page model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Page the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Page::find($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
