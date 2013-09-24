<?php

namespace app\modules\bikes\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\bikes\models\Bike;

/**
 * BikeSearch represents the model behind the search form about Bike.
 */
class BikeSearch extends Model
{
	public $id;
	public $Bezeichnung;
	public $Farbe;
	public $Kilometer;
	public $Preis;
	public $Leistung;
	public $Hubraum;
	public $Erstzulassung;
	public $Beschreibung;
	public $Ausstattung;
	public $Antriebsart;
	public $Getriebe;
	public $deleted;

	public function rules()
	{
		return array(
			array('id', 'integer'),
			array('Bezeichnung, Farbe, Erstzulassung, Beschreibung, Ausstattung, Antriebsart, Getriebe', 'safe'),
			array('Kilometer, Preis, Leistung, Hubraum', 'number'),
			array('deleted', 'boolean'),
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

	public function search($params)
	{
		$query = Bike::find();
		$dataProvider = new ActiveDataProvider(array(
			'query' => $query,
		));

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'Bezeichnung', true);
		$this->addCondition($query, 'Farbe', true);
		$this->addCondition($query, 'Kilometer');
		$this->addCondition($query, 'Preis');
		$this->addCondition($query, 'Leistung');
		$this->addCondition($query, 'Hubraum');
		$this->addCondition($query, 'Erstzulassung', true);
		$this->addCondition($query, 'Beschreibung', true);
		$this->addCondition($query, 'Ausstattung', true);
		$this->addCondition($query, 'Antriebsart', true);
		$this->addCondition($query, 'Getriebe', true);
		$this->addCondition($query, 'deleted');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')) . '%';
			$query->andWhere(array('like', $attribute, $value));
		} else {
			$query->andWhere(array($attribute => $value));
		}
	}
}
