<?php

namespace app\modules\bikes\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * BikeSearch represents the model behind the upload form about Bike.
 */
class BikeImageUpload extends Model
{

	/**
  * Used to hold the UploadedFile object created by Yii
  * @var UploadedFile the yii\web\UploadedFile object created by Yii
  */
  public $file;

	public function rules()
	{
		return array(
			array('file', 'File')
		);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return array(
			'file' => 'Datei'
		);
	}

}
