<?php

namespace app\modules\bikes\models;

/**
 * This is the model class for table "tbl_moto".
 *
 * @property integer $id
 * @property string $Bezeichnung
 * @property string $Farbe
 * @property double $Kilometer
 * @property double $Preis
 * @property double $Leistung
 * @property double $Hubraum
 * @property string $Erstzulassung
 * @property string $Beschreibung
 * @property string $Ausstattung
 * @property string $Antriebsart
 * @property string $Getriebe
 * @property boolean $deleted
 */
class Bike extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_moto';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return array(
			array('Bezeichnung, Erstzulassung', 'required'),
			array('Kilometer, Preis, Leistung, Hubraum', 'number'),
			array('Beschreibung, Ausstattung', 'string'),
			array('deleted', 'boolean'),
			array('Bezeichnung, Farbe, Antriebsart, Getriebe', 'string', 'max' => 100),
			array('Erstzulassung', 'string', 'max' => 10)
		);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Bezeichnung' => 'Bezeichnung',
			'Farbe' => 'Farbe',
			'Kilometer' => 'Kilometer',
			'Preis' => 'Preis',
			'Leistung' => 'Leistung',
			'Hubraum' => 'Hubraum',
			'Erstzulassung' => 'Erstzulassung',
			'Beschreibung' => 'Beschreibung',
			'Ausstattung' => 'Ausstattung',
			'Antriebsart' => 'Antriebsart',
			'Getriebe' => 'Getriebe',
			'deleted' => 'Deleted',
		);
	}
}
