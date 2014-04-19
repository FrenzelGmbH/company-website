<?php

namespace app\modules\recipies\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\recipies\models\Reciepe;

/**
 * ReciepeSearch represents the model behind the search form about `app\modules\recipies\models\Reciepe`.
 */
class ReciepeSearch extends Model
{
    public $id;
    public $parent_id;
    public $name;
    public $creator_id;
    public $status;
    public $time_deleted;
    public $time_create;

    public function rules()
    {
        return [
            [['id', 'parent_id', 'creator_id', 'time_deleted', 'time_create'], 'integer'],
            [['name', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'name' => Yii::t('app', 'Name'),
            'creator_id' => Yii::t('app', 'Creator ID'),
            'status' => Yii::t('app', 'Status'),
            'time_deleted' => Yii::t('app', 'Time Deleted'),
            'time_create' => Yii::t('app', 'Time Create'),
        ];
    }

    public function search($params)
    {
        $query = Reciepe::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'parent_id');
        $this->addCondition($query, 'name', true);
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
