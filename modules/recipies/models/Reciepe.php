<?php

namespace app\modules\recipies\models;

/**
 * This is the model class for table "tbl_recipie".
 *
 * @property string $id
 * @property string $parent_id
 * @property string $name
 * @property integer $creator_id
 * @property string $status
 * @property integer $time_deleted
 * @property integer $time_create
 *
 * @property RecipieDetail[] $recipieDetails
 */
class Reciepe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_recipie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'creator_id', 'time_deleted', 'time_create'], 'integer'],
            [['creator_id'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'creator_id' => 'Creator ID',
            'status' => 'Status',
            'time_deleted' => 'Time Deleted',
            'time_create' => 'Time Create',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipieDetails()
    {
        return $this->hasMany(RecipieDetail::className(), ['recipie_id' => 'id']);
    }
}
