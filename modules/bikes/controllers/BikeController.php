<?php

namespace app\modules\bikes\controllers;

use app\modules\bikes\models\Bike;
use app\modules\bikes\models\BikeSearch;
use app\modules\bikes\models\BikeImageUpload;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * BikeController implements the CRUD actions for Bike model.
 */
class BikeController extends Controller
{
	/**
	 * Lists all Bike models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new BikeSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', array(
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		));
	}

	/**
	 * Displays a single Bike model.
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
	 * Creates a new Bike model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Bike;
		$uploadModel = new BikeImageUpload;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(array('view', 'id' => $model->id));
		} else {
			return $this->render('create', array(
				'model' => $model,
				'uploadModel' => $uploadModel,
			));
		}
	}

	/**
	 * Updates an existing Bike model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		$uploadModel = new BikeImageUpload;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(array('view', 'id' => $model->id));
		} else {
			return $this->render('update', array(
				'model' => $model,
				'uploadModel' => $uploadModel,
			));
		}
	}

	/**
	 * Deletes an existing Bike model.
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
	 * Finds the Bike model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Bike the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Bike::find($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
