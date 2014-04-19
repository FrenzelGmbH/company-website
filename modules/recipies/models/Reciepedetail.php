<?php

namespace app\modules\recipies\models;

/**
 * This is the model class for table "tbl_recipie_detail".
 *
 * @property string $id
 * @property string $recipie_id
 * @property string $incredient_id
 * @property string $incredient
 * @property double $amount
 * @property string $uom
 * @property integer $creator_id
 * @property string $status
 * @property integer $time_deleted
 * @property integer $time_create
 *
 * @property Recipie $recipie
 */
class Reciepedetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_recipie_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipie_id', 'creator_id'], 'required'],
            [['recipie_id', 'incredient_id', 'uom', 'creator_id', 'time_deleted', 'time_create'], 'integer'],
            [['amount'], 'number'],
            [['incredient'], 'string', 'max' => 200],
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
            'recipie_id' => 'Recipie ID',
            'incredient_id' => 'Incredient ID',
            'incredient' => 'Incredient',
            'amount' => 'Amount',
            'uom' => 'Uom',
            'creator_id' => 'Creator ID',
            'status' => 'Status',
            'time_deleted' => 'Time Deleted',
            'time_create' => 'Time Create',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipie()
    {
        return $this->hasOne(Recipie::className(), ['id' => 'recipie_id']);
    }
}
