<?php

namespace app\modules\recipies\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\recipies\models\Reciepedetail;

/**
 * ReciepedetailSearch represents the model behind the search form about `app\modules\recipies\models\Reciepedetail`.
 */
class ReciepedetailSearch extends Model
{
    public $id;
    public $recipie_id;
    public $incredient_id;
    public $incredient;
    public $amount;
    public $uom;
    public $creator_id;
    public $status;
    public $time_deleted;
    public $time_create;

    public function rules()
    {
        return [
            [['id', 'recipie_id', 'incredient_id', 'uom', 'creator_id', 'time_deleted', 'time_create'], 'integer'],
            [['incredient', 'status'], 'safe'],
            [['amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'recipie_id' => Yii::t('app', 'Recipie ID'),
            'incredient_id' => Yii::t('app', 'Incredient ID'),
            'incredient' => Yii::t('app', 'Incredient'),
            'amount' => Yii::t('app', 'Amount'),
            'uom' => Yii::t('app', 'Uom'),
            'creator_id' => Yii::t('app', 'Creator ID'),
            'status' => Yii::t('app', 'Status'),
            'time_deleted' => Yii::t('app', 'Time Deleted'),
            'time_create' => Yii::t('app', 'Time Create'),
        ];
    }

    public function search($params)
    {
        $query = Reciepedetail::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'recipie_id');
        $this->addCondition($query, 'incredient_id');
        $this->addCondition($query, 'incredient', true);
        $this->addCondition($query, 'amount');
        $this->addCondition($query, 'uom');
        $this->addCondition($query, 'creator_id');
        $this->addCondition($query, 'status', true);
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
