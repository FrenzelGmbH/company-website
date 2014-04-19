<?php

namespace app\modules\parties\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\parties\models\Party;

/**
 * PartySearch represents the model behind the search form about `app\modules\parties\models\Party`.
 */
class PartySearch extends Model
{
    public $id;
    public $organisationName;
    public $partyNote;
    public $taxNumber;
    public $registrationNumber;
    public $registrationCountryCode;
    public $party_type;
    public $system_key;
    public $system_name;
    public $system_upate;
    public $creator_id;
    public $time_deleted;
    public $time_create;

    public function rules()
    {
        return [
            [['id', 'registrationCountryCode', 'party_type', 'system_upate', 'creator_id', 'time_deleted', 'time_create'], 'integer'],
            [['organisationName', 'partyNote', 'taxNumber', 'registrationNumber', 'system_key', 'system_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'organisationName' => Yii::t('app', 'Organisation Name'),
            'partyNote' => Yii::t('app', 'Note'),
            'taxNumber' => Yii::t('app', 'Tax Number'),
            'registrationNumber' => Yii::t('app', 'Registration Number'),
            'registrationCountryCode' => Yii::t('app', 'Registration Country Code'),
            'party_type' => Yii::t('app', 'Party Type'),
            'system_key' => Yii::t('app', 'System Key'),
            'system_name' => Yii::t('app', 'System Name'),
            'system_upate' => Yii::t('app', 'System Upate'),
            'creator_id' => Yii::t('app', 'Creator'),
            'time_deleted' => Yii::t('app', 'Deleted on'),
            'time_create' => Yii::t('app', 'Created on'),
        ];
    }

    public function search($params)
    {
        $query = Party::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'organisationName', true);
        $this->addCondition($query, 'partyNote', true);
        $this->addCondition($query, 'taxNumber', true);
        $this->addCondition($query, 'registrationNumber', true);
        $this->addCondition($query, 'registrationCountryCode');
        $this->addCondition($query, 'party_type');
        $this->addCondition($query, 'system_key', true);
        $this->addCondition($query, 'system_name', true);
        $this->addCondition($query, 'system_upate');
        $this->addCondition($query, 'creator_id');
        $this->addCondition($query, 'time_deleted');
        $this->addCondition($query, 'time_create');
        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
