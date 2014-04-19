<?php

namespace app\modules\recipies\models;

/**
 * This is the model class for table "tbl_incredient".
 *
 * @property string $id
 * @property string $name
 * @property double $cup_factor
 * @property integer $creator_id
 * @property string $status
 * @property integer $time_deleted
 * @property integer $time_create
 */
class Incredient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_incredient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cup_factor'], 'number'],
            [['creator_id'], 'required'],
            [['creator_id', 'time_deleted', 'time_create'], 'integer'],
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
            'name' => 'Name',
            'cup_factor' => 'Cup Factor',
            'creator_id' => 'Creator ID',
            'status' => 'Status',
            'time_deleted' => 'Time Deleted',
            'time_create' => 'Time Create',
        ];
    }
}
